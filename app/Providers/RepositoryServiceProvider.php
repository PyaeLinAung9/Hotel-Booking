<?php

namespace App\Providers;

use App\Repository\bed\BedRepository;
use App\Repository\Room\RoomRepository;
use App\Repository\View\ViewRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\amenity\AmenityRepository;
use App\Repository\Feature\FeatureRepository;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\HotelSetting\SettingRepository;
use App\Repository\Reservation\ReservationRepository;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Feature\FeatureRepositoryInterface;
use App\Repository\HotelSetting\SettingRepositoryInterface;
use App\Repository\Reservation\ReservationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ViewRepositoryInterface::class,ViewRepository::class);
        $this->app->bind(BedRepositoryInterface::class,BedRepository::class);
        $this->app->bind(AmenityRepositoryInterface::class,AmenityRepository::class);
        $this->app->bind(FeatureRepositoryInterface::class,FeatureRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class,ReservationRepository::class);
        $this->app->bind(RoomRepositoryInterface::class,RoomRepository::class);
        $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
