<?php

namespace App\Http\Controllers\Setting;

use App\Models\HotelSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\HotelSetting\SettingRepositoryInterface;

class HotelSettingController extends Controller
{
    private $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository) {
        DB::connection()->enableQueryLog();
        $this->settingRepository = $settingRepository;

    }

    public function getSetting() {
        $getData     = $this->settingRepository->get();
        return view('admin_backend.hotelSetting.form',compact('getData'));
    }
}
