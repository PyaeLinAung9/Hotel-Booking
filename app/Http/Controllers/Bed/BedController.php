<?php

namespace App\Http\Controllers\Bed;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\bed\bedStoreRequest;
use App\Http\Requests\bed\bedUpdateValidation;
use App\Repository\Bed\BedRepositoryInterface;
use App\ReturnMessage;
use App\Utility;

class BedController extends Controller
{
    private $bedRepository;

    public function __construct(BedRepositoryInterface $bedRepository) {
        DB::connection()->enableQueryLog();
        $this->bedRepository = $bedRepository;
    }

    public function bedForm() {
        return view('admin_backend.bed.form');
    }

    public function bedCreate(bedStoreRequest $request) {

        try{
            $result = $this->bedRepository->createbeds($request->all());
            $logs = "Bed Create Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('bedList')->with('successMsg','bed name create success.');
            }else{
                return redirect()->route('bedList')->with('errorMsg','bed name create fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function bedList() {
        try{
            $bedData   = $this->bedRepository->getbeds();
            $logs = "Bed List Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/bed/list',compact([
                'bedData'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function bedEdit($id) {
        try{
            $bedData   = $this->bedRepository->editbeds($id);
            $logs = "Bed Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/bed/form',compact([
                'bedData',
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function bedUpdate(bedUpdateValidation $request) {
        try{
            $result = $this->bedRepository->updatebeds($request->all());
            $logs = "Bed Update Screen::";
            Utility::saveDebugLog($logs);

            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('bedList')->with('successMsg','bed name update success.');
            }else{
                return redirect()->route('bedList')->with('errorMsg','bed name update fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function bedDelete($id) {
        try{
            $result = $this->bedRepository->deletebeds($id);
            $logs = "Bed Delete Screen::";
            Utility::saveDebugLog($logs);

            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('bedList')->with('deleteMsg','bed name deleted success.');
            }else{
                return redirect()->route('bedList')->with('errorMsg','bed name deleted fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
