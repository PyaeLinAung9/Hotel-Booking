<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\bed\BedController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Amenity\AmenityController;
use App\Http\Controllers\Feature\FeatureController;
use App\Http\Controllers\Setting\HotelSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('hello',[TestController::class, 'index']);
Route::get('hello/{id}/category/{cad_id}',[TestController::class,'show']);

// Route::get('view',[TestController::class, 'viewPage'])->name('viewPage');
// Route::post('view',[TestController::class,'viewCreate']);
// Route::get('view/list',[TestController::class,'viewList'])->name('viewList');
// Route::get('view/edit/{id}',[TestController::class,'viewEdit']);
// Route::post('view/update',[TestController::class,'viewUpdate'])->name('viewUpdate');
// Route::get('view/delete/{id}',[TestController::class,'viewDelete'])->name('viewDelete');


Route::get('login',[LoginController::class,'loginPage'])->name('loginPage');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::post('login',[LoginController::class,'login'])->name('login');

Route::get('/',[IndexController::class,'index']);
Route::get('rooms',[IndexController::class,'rooms'])->name('rooms');

Route::prefix('room')->group(function() {
    Route::get('detail/{id}',[IndexController::class,'roomDetail'])->name('roomDetail');
    Route::get('reserve/{id}',[IndexController::class,'roomReserve']);
    Route::get('search',[IndexController::class,'roomSearch']);
    Route::post('reserve',[IndexController::class,'reservation'])->name('reservation');
});

Route::group(['prefix' => 'admin','middleware' => 'admin'],function() {
    Route::get('index',[HomeController::class,'index'])->name('index');

    Route::prefix('view')->group(function() {
        Route::get('create',[ViewController::class,'viewForm']);
        Route::get('list',[ViewController::class,'viewList'])->name('viewList');
        Route::get('edit/{id}',[ViewController::class,'viewEdit']);
        Route::get('delete/{id}',[ViewController::class,'viewDelete']);
        Route::post('create',[ViewController::class,'viewCreate'])->name('viewCreate');
        Route::post('update',[ViewController::class,'viewUpdate'])->name('viewUpdate');
    });

    Route::prefix('bed')->group(function() {
        Route::get('create',[BedController::class,'bedForm']);
        Route::get('list',[BedController::class,'bedList'])->name('bedList');
        Route::get('edit/{id}',[BedController::class,'bedEdit']);
        Route::get('delete/{id}',[BedController::class,'bedDelete']);
        Route::post('create',[BedController::class,'bedCreate'])->name('bedCreate');
        Route::post('update',[BedController::class,'bedUpdate'])->name('bedUpdate');
    });

    Route::prefix('amenity')->group(function() {
        Route::get('create',[AmenityController::class,'amenityForm']);
        Route::get('list',[AmenityController::class,'amenityList'])->name('amenityList');
        Route::get('edit/{id}',[AmenityController::class,'amenityEdit']);
        Route::get('delete/{id}',[AmenityController::class,'amenityDelete']);
        Route::post('create',[AmenityController::class,'amenityCreate'])->name('amenityCreate');
        Route::post('update',[AmenityController::class,'amenityUpdate'])->name('amenityUpdate');
    });

    Route::prefix('feature')->group(function() {
        Route::get('create',[FeatureController::class,'featureForm']);
        Route::get('list',[FeatureController::class,'featureList'])->name('featureList');
        Route::get('edit/{id}',[FeatureController::class,'featureEdit']);
        Route::get('delete/{id}',[FeatureController::class,'featureDelete']);
        Route::post('create',[FeatureController::class,'featureCreate'])->name('featureCreate');
        Route::post('update',[FeatureController::class,'featureUpdate'])->name('featureUpdate');
    });

    Route::prefix('room')->group(function() {
        Route::get('create',[RoomController::class,'roomForm']);
        Route::get('list',[RoomController::class,'roomList'])->name('roomList');
        Route::get('edit/{id}',[RoomController::class,'roomEdit']);
        Route::get('detail/{id}',[RoomController::class,'roomDetail']);
        Route::get('delete/{id}',[RoomController::class,'roomDelete']);
        Route::post('create',[RoomController::class,'roomCreate'])->name('roomCreate');
        Route::post('update',[RoomController::class,'roomUpdate'])->name('roomUpdate');

        Route::prefix('gallery')->group(function() {
            Route::get('{id}',[RoomController::class,'roomGallery'])->name('roomGallery');
            Route::get('edit/{id}',[RoomController::class,'editGallery'])->name('editGallery');
            Route::get('delete/{id}',[RoomController::class,'deleteGallery'])->name('deleteGallery');
            Route::post('create',[RoomController::class,'createGallery'])->name('galleryCreate');
            Route::post('update/{id}',[RoomController::class,'updateGallery'])->name('galleryUpdate');
        });
    });

    Route::prefix('setting')->group(function() {
        // Route::get('form',[HotelSettingController::class,'settingPage']);
        Route::get('form',[HotelSettingController::class,'getSetting'])->name('getSetting');
    });

    Route::prefix('reservation')->group(function() {
        Route::get('list',[RoomController::class,'reserveList']);
        Route::get('accept/{id}',[RoomController::class,'reservedAccept'])->name('reservedAccept');
        Route::get('decline/{id}',[RoomController::class,'reservedDecline'])->name('reservedDecline');
    });
});



