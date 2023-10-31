<?php
namespace App\Repository\Room;

interface RoomRepositoryInterface {

        public function getRooms();
        public function getRoomsByRandom();
        public function search($data);
        public function createRooms($data);
        public function editRooms($id);
        public function updateRooms($updateData);
        public function detailRooms($id);
        public function deleteRooms($id);
        public function galleryRooms($id);
        public function createGallery($data);
        public function editGallery($id);
        public function updateGallery($data);
        public function deleteGallery($id);
        public function getAmenity($id);
        public function getFeature($id);

}
