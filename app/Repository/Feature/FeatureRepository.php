<?php

namespace App\Repository\Feature;

use App\Utility;
use App\ReturnMessage;
use App\Models\SpecialFeature;
use App\Models\RoomSpecialFeature;
use App\Repository\Feature\FeatureRepositoryInterface;

class FeatureRepository implements FeatureRepositoryInterface {

    public function getFeatures()
    {
        $featureData   = SpecialFeature::select('id','name','updated_at')
                    ->WHERENULL('deleted_at')
                    ->get();
        return $featureData;
    }
    public function editFeatures($id) {
        $featureData       = SpecialFeature::find($id);
        return $featureData;
    }
    public function updateFeatures($updateData) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $feature_name      = $updateData['name'];
            $id                = $updateData['id'];
            $feature           = SpecialFeature::find($id);
            $feature->name     = $feature_name;
            $returnObj         = Utility::addUpdated($feature);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function createFeatures($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $feature_name          = $data['name'];
            $feature               = new SpecialFeature;
            $feature->name         = $feature_name;
            $returnObj             = Utility::addCreated($feature);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
    public function deleteFeatures($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $feature               = SpecialFeature::find($id);
            $returnObj          = Utility::addDeleted($feature);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function getFeatureByRoomId($roomId) {
        $featureData = [];
        $feature               = RoomSpecialFeature::SELECT('feature_id')
                                ->WHERE('room_id',$roomId)
                                ->WHERENULL('deleted_at')
                                ->get();
        foreach($feature as $data) {
            array_push($featureData,$data->feature_id);
        }
        return $featureData;
    }
}
