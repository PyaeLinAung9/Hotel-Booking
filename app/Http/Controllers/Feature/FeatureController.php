<?php

namespace App\Http\Controllers\Feature;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\feature\featureStoreRequest;
use App\Http\Requests\feature\featureUpdateRequest;
use App\Repository\Feature\FeatureRepositoryInterface;

class FeatureController extends Controller
{
    private $featureRepository;

    public function __construct(FeatureRepositoryInterface $featureRepository) {
        DB::connection()->enableQueryLog();
        $this->featureRepository = $featureRepository;
    }

    public function featureForm() {
        return view('admin_backend.feature.form');
    }

    public function featureCreate(featureStoreRequest $request) {
        try{
            $result = $this->featureRepository->createfeatures($request->all());
            $logs = "View Create Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('featureList')->with('successMsg','feature name create success.');
            }else{
                return redirect()->route('featureList')->with('errorMsg','feature name create fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function featureList() {
        try{
            $featureData   = $this->featureRepository->getfeatures();
            $logs = "View List Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/feature/list',compact([
                'featureData'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function featureEdit($id) {
        try{
            $featureData   = $this->featureRepository->editfeatures($id);
            $logs = "View Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/feature/form',compact([
                'featureData',
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function featureUpdate(featureUpdateRequest $request) {
        try{
            $result = $this->featureRepository->updatefeatures($request->all());
            $logs = "View Update Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('featureList')->with('successMsg','feature name update success.');
            }else{
                return redirect()->route('featureList')->with('errorMsg','feature name update fail.');
            }
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function featureDelete($id) {
        try{
            $result = $this->featureRepository->deletefeatures($id);
            $logs = "View Delete Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('featureList')->with('deleteMsg','feature name deleted success.');
            }else{
                return redirect()->route('featureList')->with('errorMsg','feature name deleted fail.');
            }

        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
