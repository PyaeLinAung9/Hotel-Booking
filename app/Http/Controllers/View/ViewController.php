<?php

namespace App\Http\Controllers\View;

use App\Utility;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\view\viewStoreRequest;
use App\Http\Requests\view\viewUpdateValidation;
use App\Repository\View\ViewRepositoryInterface;

class ViewController extends Controller
{
    private $viewRepository;

    public function __construct(ViewRepositoryInterface $viewRepository) {
        DB::connection()->enableQueryLog();
        $this->viewRepository = $viewRepository;
    }

    public function ViewForm() {
        return view('admin_backend.view.form');
    }

    public function viewCreate(viewStoreRequest $request) {
        try{
            $result = $this->viewRepository->createViews($request->all());
            $logs = "View Create Screen::";
            Utility::saveDebugLog($logs);
            return redirect()->route('viewList')->with('successMsg','view name create success.');
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function viewList() {
        try{
            $viewData   = $this->viewRepository->getViews();
            $logs = "View List Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/view/list',compact([
                'viewData'
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function viewEdit($id) {
        try{
            $viewData   = $this->viewRepository->editViews($id);
            $logs = "View Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('admin_backend/view/form',compact([
                'viewData',
            ]));
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function viewUpdate(viewUpdateValidation $request) {
        try{
            $this->viewRepository->updateViews($request->all());
            $logs = "View Update Screen::";
            Utility::saveDebugLog($logs);
            return redirect()->route('viewList')->with('updateMsg','view name update success');
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function viewDelete($id) {
        try{
            $this->viewRepository->deleteViews($id);
            $logs = "View Delete Screen::";
            Utility::saveDebugLog($logs);
            return redirect()->route('viewList')->with('deleteMsg','view name deleted');
        }catch(\Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }


}
