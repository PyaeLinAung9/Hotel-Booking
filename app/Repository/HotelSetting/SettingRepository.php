<?php

namespace App\Repository\HotelSetting;

use App\Models\HotelSetting;
use App\Repository\HotelSetting\SettingRepositoryInterface;
use App\ReturnMessage;
use App\Utility;

class SettingRepository implements SettingRepositoryInterface {

    public function get() {
        $setting      = HotelSetting::find(1);
        return $setting;
    }
}
