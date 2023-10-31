<?php
namespace App\Repository\View;

interface ViewRepositoryInterface {

        public function getViews();
        public function editViews($id);
        public function updateViews($updateData);
        public function createViews($data);
        public function deleteViews($id);

}
