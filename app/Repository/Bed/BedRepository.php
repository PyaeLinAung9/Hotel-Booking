<?php

namespace App\Repository\Bed;

use App\Models\Bed;
use App\Repository\Bed\BedRepositoryInterface;
use App\ReturnMessage;
use App\Utility;

class BedRepository implements BedRepositoryInterface {

    public function getBeds()
    {
        $bedData   = Bed::select('id','name','updated_at')
                    ->WHERENULL('deleted_at')
                    ->get();
        return $bedData;
    }
    public function editBeds($id) {
        $bedData       = Bed::find($id);
        return $bedData;
    }
    public function updateBeds($updateData) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $bed_name          = $updateData['name'];
            $id                = $updateData['id'];
            $bed               = Bed::find($id);
            $bed->name         = $bed_name;
            $returnObj         = Utility::addUpdated($bed);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function createBeds($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $bed_name          = $data['name'];
            $bed               = new Bed;
            $bed->name         = $bed_name;
            $returnObj          = Utility::addCreated($bed);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
    public function deleteBeds($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $bed               = Bed::find($id);
            $returnObj         = Utility::addDeleted($bed);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
}
