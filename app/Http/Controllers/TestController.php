<?php

namespace App\Http\Controllers;

use App\Models\View;
use App\Models\HotelSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\dataValidation;
use App\Http\Requests\editDataValidation;

class TestController extends Controller
{
    //
    public function index(request $request) {
        $string     = "LO LI Tar";
        $array      = [
            'name' => 'Hla Hla',
            'age' => '43',
            'gender' => 'male'
        ];
        $setting    = HotelSetting::SELECT('name','email','occupancy')
                    ->WHERENULL('deleted_at')
                    ->first();

        return view('test.hello',compact(['string','array','setting']));
    }
    public function show($id,$cad_id) {
        dd($id,$cad_id);
    }
    //view page
    public function viewPage() {
        return view('admin_backend.view_create');
    }
    //view create
    public function viewCreate(dataValidation $request) {
        $view_name    = $request->get('name');
        $user_id      = '1';
        $today_date   = date('Y-m-d H:i:s');
        $viewObj                = new View; 
        $viewObj->name          = $view_name;
        $viewObj->created_by    = $user_id;
        $viewObj->updated_by    = $user_id;
        $viewObj->created_at    = $today_date;
        $viewObj->updated_at    = $today_date;
        $viewObj->save();

        // DB::table('views')->insert([
        //     'name'  => $view_name,
        //     'created_by' => $user_id,
        //     'updated_by' => $user_id,
        //     'created_at' => $today_date,
        //     'updated_at' => $today_date,
        // ]);
        return redirect()->route('viewList')->with('success','View Create Successful');
    }
    //view list
    public function viewList() {
        $viewData       = View::select('id','name','created_at','created_by')
                        ->WHERENULL('deleted_at')
                        ->get();
        return view('admin_backend.view_list',compact([
            'viewData',
        ]));
    }
    public function viewEdit($id) {
        $editData       = View::WHERE('id',$id)->first();
        return view('admin_backend.view_edit',compact([
            'editData',
        ]));       
    }

    public function viewUpdate(editDataValidation $request) {
        $id         = $request->get('id');
        $name       = $request->get('name');
        $viewObj    = View::find($id);
        $viewObj->name  = $name;
        $viewObj->save();
        return redirect()->route('viewList')->with('success','View Updated Successful');  
    }

    public function viewDelete($id) {
        $today_date     = date('Y-m-d H:i:s');
        $user_id        = '1';
        $deleteData     = View::find($id);
        $deleteData->deleted_at   = $today_date;
        $deleteData->deleted_by   = $user_id;
        $deleteData->save();
        return redirect()->route('viewList')->with('delete','View Delete Successful');  
    }

}
