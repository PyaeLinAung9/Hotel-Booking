<?php
namespace App\Repository\Amenity;

interface AmenityRepositoryInterface {

        public function getAmenities();
        public function editAmenities($id);
        public function updateAmenities($updateData);
        public function createAmenities($data);
        public function deleteAmenities($id);
        public function getAmenityByRoomId($roomId);


}
