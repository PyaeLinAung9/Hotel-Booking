<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Utility;
use App\Models\Room;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room\RoomReserveRequest;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\Reservation\ReservationRepositoryInterface;

class IndexController extends Controller
{
    private $RoomRepository;
    private $ReservationRepository;

    public function __construct(
        RoomRepositoryInterface $RoomRepository,
        ReservationRepositoryInterface $ReservationRepository,
        ) {
        DB::connection()->enableQueryLog();
        $this->RoomRepository = $RoomRepository;
        $this->ReservationRepository = $ReservationRepository;
    }

    public function index() {
        try{
            $roomRandom   = $this->RoomRepository->getRoomsByRandom();
            $logs = "User Room List Screen::";
            Utility::saveDebugLog($logs);
            return view('frontend/home/index',compact([
                'roomRandom'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function rooms() {
        $roomData   = $this->RoomRepository->getRooms();
        return view('frontend.room.rooms',compact([
            'roomData'
        ]));
    }

    public function roomDetail($id) {
        try{
            $roomDetail     = Room::find($id);
            $roomAmenity    = $this->RoomRepository->getAmenity($id);
            $roomFeature    = $this->RoomRepository->getFeature($id);
            return view('frontend.room.detail',compact([
                'roomDetail','roomAmenity','roomFeature'
            ]));
        }catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function roomReserve($id) {
        $roomReserve   = Room::find($id);
        return view('frontend.room.reserve',compact([
            'roomReserve'
        ]));
    }

    public function reservation(RoomReserveRequest $request) {
        try{
            $result    = $this->ReservationRepository->reserveRoom($request->all());
            $logs = "User Room List Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return back()->with('successMsg','Room Reservation success.');
            }else{
                return back()->with('errorMsg','Room Reservation Fail.')->withInput();
            }
        }catch(Exception $e) {
            dd($e->getMessage());
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function roomSearch(Request $request) {
        $roomData    = $this->RoomRepository->search($request->all());
        return view('frontend.room.rooms',compact([
            'roomData'
        ]));
    }

}
