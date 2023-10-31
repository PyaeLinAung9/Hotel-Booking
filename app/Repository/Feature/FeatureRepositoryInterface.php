<?php
namespace App\Repository\Feature;

interface FeatureRepositoryInterface {

        public function getFeatures();
        public function editFeatures($id);
        public function updateFeatures($updateData);
        public function createFeatures($data);
        public function deleteFeatures($id);
        public function getFeatureByRoomId($roomId);

}
