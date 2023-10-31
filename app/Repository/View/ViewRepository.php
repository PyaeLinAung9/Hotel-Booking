<?php

namespace App\Repository\View;

use App\Models\View;
use App\Repository\View\ViewRepositoryInterface;
use App\ReturnMessage;
use App\Utility;

class ViewRepository implements ViewRepositoryInterface {

    public function getViews()
    {
        $viewData   = View::select('id','name','updated_at')
                    ->WHERENULL('deleted_at')
                    ->get();
        return $viewData;
    }
    public function editViews($id) {
        $viewData       = View::find($id);
        return $viewData;
    }
    public function updateViews($updateData) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $view_name          = $updateData['name'];
            $id                 = $updateData['id'];
            $view               = View::find($id);
            $view->name         = $view_name;
            $returnObj          = Utility::addUpdated($view);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function createViews($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $view_name          = $data['name'];
            $view               = new View;
            $view->name         = $view_name;
            $returnObj          = Utility::addCreated($view);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
    public function deleteViews($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $view               = View::find($id);
            $returnObj          = Utility::addDeleted($view);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
}
