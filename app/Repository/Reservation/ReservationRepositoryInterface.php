<?php
namespace App\Repository\Reservation;

interface ReservationRepositoryInterface {

        public function reserveRoom($data);
        public function getReservedRoom();
        public function reservedAccept($id);
        public function reservedDecline($id);
}
