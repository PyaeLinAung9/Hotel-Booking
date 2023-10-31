<?php
namespace App\Repository\Bed;

interface BedRepositoryInterface {

        public function getBeds();
        public function editBeds($id);
        public function updateBeds($updateData);
        public function createBeds($data);
        public function deleteBeds($id);

}
