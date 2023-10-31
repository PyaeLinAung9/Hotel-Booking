<?php

namespace App\Repository\Amenity;

use App\Utility;
use App\ReturnMessage;
use App\Models\Amenities;
use App\Models\RoomAmenity;
use App\Models\RoomSpecialFeature;
use App\Repository\Amenity\AmenityRepositoryInterface;

class AmenityRepository implements AmenityRepositoryInterface {

    public function getAmenities()
    {
        $amenityData   = Amenities::select('id','name','type','updated_at')
                        ->WHERENULL('deleted_at')
                        ->get();
        return $amenityData;
    }
    public function editAmenities($id) {
        $amenityData       = Amenities::find($id);
        return $amenityData;
    }
    public function updateAmenities($updateData) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $amenity_name          = $updateData['name'];
            $amenity_type          = $updateData['type'];
            $id                    = $updateData['id'];
            $amenity               = Amenities::find($id);
            $amenity->name         = $amenity_name;
            $amenity->type         = $amenity_type;
            $returnObj         = Utility::addUpdated($amenity);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function createAmenities($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $amenity_name          = $data['name'];
            $amenity_type          = $data['type'];
            $amenity               = new Amenities;
            $amenity->name         = $amenity_name;
            $amenity->type         = $amenity_type;
            $returnObj             = Utility::addCreated($amenity);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
    public function deleteAmenities($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $amenity               = Amenities::find($id);
            $returnObj             = Utility::addDeleted($amenity);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function getAmenityByRoomId($roomId) {
        $amenityData = [];
        $amenity    = RoomAmenity::SELECT('amenity_id')
                    ->WHERE('room_id',$roomId)
                    ->WHERENULL('deleted_at')
                    ->get();
        foreach($amenity as $data) {
            array_push($amenityData,$data->amenity_id);
        }
        return $amenityData;
    }


}
