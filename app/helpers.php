<?php

use App\Models\HotelSetting;

if(! function_exists('getSiteSetting') ) {
    function getSiteSetting() {
        $siteSetting    = HotelSetting::first();
        return $siteSetting;
    }
}

if(!function_exists('getRoomNameByView')) {
    function getRoomNameByView($view) {
        $roomName   = "";
        if($view->getRoomsByView() != null) {
            foreach ($view->getRoomsByView as $room) {
                $roomName   .= $room->name . ",";
            }
        }
        return rtrim($roomName,',');
    }
}

if(!function_exists('getRoomNameByBed')) {
    function getRoomNameByBed($bed) {
        $roomName   = "";
        if($bed->getRoomsByBed() != null) {
            foreach ($bed->getRoomsByBed as $room) {
                $roomName   .= $room->name . ",";
            }
        }
        return rtrim($roomName,',');
    }
}

if(!function_exists('getViewNameByRoom')) {
    function getViewNameByRoom($room) {
        $viewName   = "";
        if($room->getViewByRoom() != null) {
                $viewName   = $room->getViewByRoom->name ;
        }
        return ($viewName);
    }
}

if(!function_exists('getImageGallery')) {
    function getImageGallery($room) {
        $viewName   = "";
        if($room->getImageFromGallery() != null) {
                $viewName   = $room->getImageGallery->name ;
        }
        dd($viewName);
        return ($viewName);
    }
}

// if(!function_exists('getReserveRoomByBooking')) {
//     function getReserveRoomByBooking($room) {
//         $viewName   = "";
//         if($room->getReserveRoom() != null) {
//             $viewName   = $room->getReserveRoom->name ;
//         }
//         dd($viewName);
//         return ($viewName);
//     }
// }
?>
