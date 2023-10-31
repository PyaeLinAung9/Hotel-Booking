<?php

namespace App\Repository\Room;

use DateTime;
use App\Utility;
use App\Constant;
use Carbon\Carbon;
use App\Models\Room;
use App\ReturnMessage;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\RoomAmenity;
use App\Models\RoomGallery;

use function Ramsey\Uuid\v1;
use App\Models\RoomSpecialFeature;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Repository\Room\RoomRepositoryInterface;

class RoomRepository implements RoomRepositoryInterface {

    public function getRooms()
    {
        $roomData   = Room::SELECT(
                    'rooms.id',
                    'rooms.name',
                    'rooms.occupation',
                    'rooms.bed',
                    'rooms.size',
                    'rooms.view',
                    'rooms.price_per_day',
                    'rooms.extra_bed_price',
                    'rooms.description',
                    'rooms.detail',
                    'rooms.thumbnail_image',
                    'beds.name as bed_name')
                    ->LEFTJOIN('beds','beds.id','rooms.bed')
                    ->WHERENULL('rooms.deleted_at')
                    ->WHERENULL('beds.deleted_at')
                    ->get();
        return $roomData;
    }

    public function getRoomsByRandom() {
        $roomRandom     = Room::select('id','name','price_per_day','detail','thumbnail_image')
                        ->WhereNull('deleted_at')
                        ->inRandomOrder()
                        ->limit(6)
                        ->get();
        return $roomRandom;
    }

    public function search($data) {

            $checkIn               = $data['check-in-date'];
            $carbonCheckInDate     = Carbon::createFromFormat('m/d/Y', $checkIn);
            $formattedCheckInDate  = $carbonCheckInDate->format('Y-m-d');

            $checkOut               = $data['check-out-date'];
            $carbonCheckOutDate     = Carbon::createFromFormat('m/d/Y', $checkOut);
            $formattedCheckOutDate  = $carbonCheckOutDate->format('Y-m-d');
            $remove_ids	= [];
            $sql1       = Booking::select('room_id')
                        ->where('check_in', '<=', $formattedCheckInDate)
                        ->where('check_out', '>', $formattedCheckInDate)
                        ->where('status', '0')
                        ->whereNull('deleted_at')
                        ->get();
            foreach ($sql1 as $sql) {
                array_push($remove_ids, $sql->room_id);
            }
            $sql2       = Booking::select('room_id')
                        ->where('check_in', '<', $formattedCheckOutDate)
                        ->where('check_out', '>=', $formattedCheckOutDate)
                        ->where('status', '0')
                        ->whereNull('deleted_at')
                        ->get();
            foreach ($sql2 as $sql) {
                array_push($remove_ids, $sql->room_id);
            }

            $rooms      = Room::select('id', 'name', 'price_per_day', 'detail', 'thumbnail_image')
                        ->whereNotIn('id', $remove_ids)
                        ->whereNull('deleted_at')
                        ->orderByDesc('id')
                        ->get();
            return $rooms;
    }

    public function createRooms($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try {
            $file           = $data['image-name'];
            $extension      = $file->getClientOriginalExtension();
            $name           = $file->getClientOriginalName();
            $filename       = pathinfo($name, PATHINFO_FILENAME);
            $uniqueName     = $filename . uniqid() . '.' . $extension;

            $amenities              = $data['amenity'];
            $features               = $data['feature'];
            $room                   = new Room();
            $room->name             = $data['name'];
            $room->occupation       = $data['occupation'];
            $room->bed              = $data['bed'];
            $room->size             = $data['size'];
            $room->view             = $data['view'];
            $room->price_per_day    = $data['price_per_day'];
            $room->extra_bed_price  = $data['extra_bed_price'];
            $room->description      = $data['description'];
            $room->detail           = $data['detail'];
            $room->thumbnail_image  = $uniqueName;
            $returnObj              = Utility::addCreated($room);
            $returnObj->save();

            $imagePath      = public_path('assets/upload/' . $returnObj->id . '/thumb' );
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            Utility::cropAndResizeImage($file,Constant::THUMB_WIDTH,Constant::THUMB_HEIGHT,$imagePath,$uniqueName);
            self::createRoomAmenity($amenities,$returnObj->id);
            self::createRoomSpecialFeature($features,$returnObj->id);
            DB::commit();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            $returnMessage['createdRoomId']       = $returnObj->id;
            return $returnMessage;
        } catch (\Exception $e) {
            DB::rollBack();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    private static function createRoomAmenity($amenities, $roomId) {

        foreach ($amenities as $amenity) {
            $roomAmentiy                = new RoomAmenity;
            $roomAmentiy->amenity_id    = $amenity;
            $roomAmentiy->room_id       = $roomId;
            $returnObj                  = Utility::addCreated($roomAmentiy);
            $returnObj->save();
        }
        return true;
    }
    private static function createRoomSpecialFeature($features, $roomId) {

        foreach ($features as $feature) {
            $roomFeature                = new RoomSpecialFeature;
            $roomFeature->feature_id    = $feature;
            $roomFeature->room_id       = $roomId;
            $returnObj                  = Utility::addCreated($roomFeature);
            $returnObj->save();
        }
        return true;
    }

    public function editRooms($id) {
        $roomData       = Room::find($id);
        return $roomData;
    }
    public function updateRooms($updateData) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $amenities              = $updateData['amenity'];
            $features               = $updateData['feature'];
            $id                     = $updateData['id'];
            $room                   = Room::find($id);
            $room->name             = $updateData['name'];
            $room->occupation       = $updateData['occupation'];
            $room->bed              = $updateData['bed'];
            $room->size             = $updateData['size'];
            $room->view             = $updateData['view'];
            $room->price_per_day    = $updateData['price_per_day'];
            $room->extra_bed_price  = $updateData['extra_bed_price'];
            $room->description      = $updateData['description'];
            $room->detail           = $updateData['detail'];
            if(array_key_exists('image-name',$updateData)) {
                $file           = $updateData['image-name'];
                $extension      = $file->getClientOriginalExtension();
                $name           = $file->getClientOriginalName();
                $filename       = pathinfo($name, PATHINFO_FILENAME);
                $uniqueName     = $filename . uniqid() . '.' . $extension;
                $room->thumbnail_image  = $uniqueName;
            }
            $returnObj              = Utility::addUpdated($room);
            $returnObj->save();

            if(array_key_exists('image-name',$updateData)) {
                $imagePath      = public_path('assets/upload/' . $returnObj->id . '/thumb' );
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }
                Utility::cropAndResizeImage($file,Constant::THUMB_WIDTH,Constant::THUMB_HEIGHT,$imagePath,$uniqueName);
            }
            self::deleteRoomAmenity($id);
            self::deleteSpecialFeature($id);
            self::createRoomAmenity($amenities,$returnObj->id);
            self::createRoomSpecialFeature($features,$returnObj->id);
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            // dd($e->getMessage());
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    private static function deleteRoomAmenity($roomId) {
        RoomAmenity::where('room_id',$roomId)->delete();
        return true;
    }

    private static function deleteSpecialFeature($roomId) {
        RoomSpecialFeature::where('room_id',$roomId)->delete();
        return true;
    }

    public function deleteRooms($id) {

        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $room                  = Room::find($id);
            $returnObj             = Utility::addDeleted($room);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    /** gallery **/
    public function galleryRooms($id) {
        $roomGallery   = RoomGallery::select('id','image')
                        ->WHERE('room_id', $id)
                        ->WHERENULL('deleted_at')
                        ->get();
        return $roomGallery;
    }

    public function createGallery($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $file           = $data['image-name'];
            $extension      = $file->getClientOriginalExtension();
            $name           = $file->getClientOriginalName();
            $filename       = pathinfo($name, PATHINFO_FILENAME);
            $uniqueName     = $filename . uniqid() . '.' . $extension;
            $gallery            = new RoomGallery();
            $gallery->image     = $uniqueName;
            $gallery->room_id   = $data['room_id'] ;
            $returnObj          = Utility::addCreated($gallery);
            $returnObj->save();
            $imagePath      = public_path('assets/upload/' . $data['room_id']  );

            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            Utility::cropAndResizeImage($file,Constant::THUMB_WIDTH,Constant::THUMB_HEIGHT,$imagePath,$uniqueName);
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        }catch(\Exception $e){
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function editGallery($id) {
        $roomGalleryData       = RoomGallery::find($id);
        return $roomGalleryData;
    }

    public function updateGallery($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $file           = $data['image-name'];
            $extension      = $file->getClientOriginalExtension();
            $name           = $file->getClientOriginalName();
            $filename       = pathinfo($name, PATHINFO_FILENAME);
            $uniqueName     = $filename . uniqid() . '.' . $extension;
            $id             = $data['id'];
            $gallery            = RoomGallery::find($id);
            $old_image          = $gallery->image;
            $gallery->image     = $uniqueName;
            $returnObj          = Utility::addUpdated($gallery);
            $returnObj->save();
            $imagePath      = public_path('assets/upload/' . $data['room_id']  );

            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }

            Utility::cropAndResizeImage($file,Constant::THUMB_WIDTH,Constant::THUMB_HEIGHT,$imagePath,$uniqueName);
            $old_image_path     = public_path('assets/upload/' . $data['room_id'] . "/" .$old_image  );
            unlink($old_image_path);
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        }catch(\Exception $e){
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function detailRooms($id) {
        $roomDetail       = Room::find($id);
        return $roomDetail;
    }

    public function deleteGallery($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $gallery               = RoomGallery::find($id);
            $room_id               = $gallery->room_id;
            $old_image             = $gallery->image;
            $returnObj             = Utility::addDeleted($gallery);
            $returnObj->save();
            $old_image_path     = public_path('assets/upload/' . $room_id . "/" .$old_image  );
            unlink($old_image_path);
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function getAmenity($id) {
        $roomAmenity    = RoomAmenity::select('amenities.name','amenities.type')
                        ->LEFTJOIN('amenities','room_amenities.amenity_id','amenities.id',)
                        ->where('room_amenities.room_id',$id)
                        ->wherenull('room_amenities.deleted_at')
                        ->wherenull('amenities.deleted_at')
                        ->get();
        return $roomAmenity;
    }

    public function getFeature($id) {
        $roomFeature    = RoomSpecialFeature::select('special_features.name',)
                        ->LEFTJOIN('special_features','room_special_features.Feature_id','special_features.id',)
                        ->where('room_special_features.room_id',$id)
                        ->wherenull('room_special_features.deleted_at')
                        ->wherenull('special_features.deleted_at')
                        ->get();
        return $roomFeature;
    }

}
