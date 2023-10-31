<?php

namespace App\Http\Controllers\Room;

use App\Utility;
use App\ReturnMessage;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\Room\RoomStoreRequest;
use App\Http\Requests\Room\RoomUpdateRequest;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Http\Requests\Gallery\GalleryStoreRequest;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Feature\FeatureRepositoryInterface;
use App\Repository\Reservation\ReservationRepositoryInterface;

class RoomController extends Controller
{
    private $AmenityRepository;
    private $BedRepository;
    private $FeatureRepository;
    private $RoomRepository;
    private $ViewRepository;
    private $ReservationRepository;

    public function __construct(
        AmenityRepositoryInterface $AmenityRepository,
        BedRepositoryInterface $BedRepository,
        FeatureRepositoryInterface $FeatureRepository,
        RoomRepositoryInterface $RoomRepository,
        ViewRepositoryInterface $ViewRepository,
        ReservationRepositoryInterface $ReservationRepository
        ) {
        DB::connection()->enableQueryLog();
        $this->AmenityRepository = $AmenityRepository;
        $this->BedRepository = $BedRepository;
        $this->FeatureRepository = $FeatureRepository;
        $this->RoomRepository = $RoomRepository;
        $this->ViewRepository = $ViewRepository;
        $this->ReservationRepository = $ReservationRepository;
    }

    public function RoomForm() {
        $amenityData = $this->AmenityRepository->getAmenities();
        $featureData = $this->FeatureRepository->getFeatures();
        $bedData     = $this->BedRepository->getBeds();
        $viewData    = $this->ViewRepository->getViews();
        return view('admin_backend.room.form',compact(['amenityData','featureData','bedData','viewData']));
    }

    public function RoomCreate(RoomStoreRequest $request) {
        try{
            $result = $this->RoomRepository->createRooms($request->all());
            $logs = "Room Create Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                $roomId     = $result['createdRoomId'];
                return redirect()->route('roomGallery',$roomId)->with('successMsg','Room create success.');
            }else{
                return redirect()->route('roomList')->with('errorMsg','Room name create fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function RoomList() {
        try{
            $RoomData   = $this->RoomRepository->getRooms();
            $logs = "Room List Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/room/list',compact([
                'RoomData'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function RoomEdit($id) {
        try{
            $amenityData        = $this->AmenityRepository->getAmenities();
            $featureData        = $this->FeatureRepository->getFeatures();
            $bedData            = $this->BedRepository->getBeds();
            $viewData           = $this->ViewRepository->getViews();
            $roomData           = $this->RoomRepository->editRooms($id);
            $amenityByRoomId    = $this->AmenityRepository->getAmenityByRoomId($id);
            $featureByRoomId    = $this->FeatureRepository->getFeatureByRoomId($id);
            $logs = "Room Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/room/form',compact([
                'roomData','amenityData','featureData','bedData','viewData','amenityByRoomId','featureByRoomId'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function RoomUpdate(request $request) {
        try{
            $result = $this->RoomRepository->updateRooms($request->all());
            $logs = "Room Update Screen::";
            Utility::saveDebugLog($logs);

            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('roomList')->with('successMsg','Room name update success.');
            }else{
                return back()->with('errorMsg','Room name update fail.')->withInput();
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function RoomDetail($id) {
        try{
            $amenityDetail = $this->AmenityRepository->getAmenities();
            $featureDetail = $this->FeatureRepository->getFeatures();
            $bedDetail     = $this->BedRepository->getBeds();
            $viewDetail    = $this->ViewRepository->getViews();
            $roomDetail    = $this->RoomRepository->detailRooms($id);
            $logs = "Room Detail Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/room/detail',compact([
                'roomDetail','amenityDetail','featureDetail','bedDetail','viewDetail'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function RoomDelete($id) {
        try{
            $result = $this->RoomRepository->deleteRooms($id);
            $logs = "Room Delete Screen::";
            Utility::saveDebugLog($logs);

            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('roomList')->with('deleteMsg','Room name deleted success.');
            }else{
                return redirect()->route('roomList')->with('errorMsg','Room name deleted fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    // gallery
    public function RoomGallery($id) {
        try{
            $roomGallery   = $this->RoomRepository->galleryRooms($id);
            $logs = "Room Gallery Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/room/roomGallery',compact([
                'roomGallery','id',
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function CreateGallery(GalleryStoreRequest $request) {
        try{
            $result     = $this->RoomRepository->createGallery($request->all());
            $logs = "Room Gallery Create Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return back()->with('successMsg','Room gallery photo create success.');
            }else{
                return back();
        }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function EditGallery($id) {
        try{
            $roomGalleryData    = $this->RoomRepository->editGallery($id);
            if(!$roomGalleryData) {
                abort(404);
            }
            return view('admin_backend/room/roomGallery',compact('roomGalleryData'));
        }catch(\Exception $e){
            abort(500);
        }
    }

    public function UpdateGallery(GalleryStoreRequest $request) {
        try{
            $result     = $this->RoomRepository->updateGallery($request->all());
            $logs = "Room Gallery Update Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('roomGallery',$request->room_id)->with('successMsg','Room gallery update success.');
            }else{
                return redirect()->route('roomGallery',$request->room_id);
        }
        }catch(\Exception $e){
            // dd($e->getMessage());
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function DeleteGallery($id) {
        try{
            $result = $this->RoomRepository->deleteGallery($id);
            $logs = "Room Gallery Delete Screen::";
            Utility::saveDebugLog($logs);

            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return back()->with('deleteMsg','Room photo deleted success.');
            }else{
                return back()->with('errorMsg','Room photo deleted fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function reserveList() {
        try{
            $roomReserve   = $this->ReservationRepository->getReservedRoom();
            $logs = "Room Reserve List Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/reservation/list',compact([
                'roomReserve'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function reservedAccept($id) {
        try{
            $this->ReservationRepository->reservedAccept($id);
            $logs = "Room Reserve Accept ::";
            Utility::saveDebugLog($logs);
            return back();
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function reservedDecline($id) {
        try{
            $this->ReservationRepository->reservedDecline($id);
            $logs = "Room Reserve Decline::";
            Utility::saveDebugLog($logs);
            return back();
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
