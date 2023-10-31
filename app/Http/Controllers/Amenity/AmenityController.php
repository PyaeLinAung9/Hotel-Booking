<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Http\Requests\amenity\amenityStoreRequest;
use App\Http\Requests\amenity\amenityUpdateRequest;
use App\Repository\Amenity\AmenityRepositoryInterface;

class AmenityController extends Controller
{

    private $amenityRepository;

    public function __construct(AmenityRepositoryInterface $amenityRepository) {
        $this->amenityRepository = $amenityRepository;
    }

    public function amenityForm() {
        return view('admin_backend.amenity.form');
    }

    public function amenityCreate(amenityStoreRequest $request) {
        try{
            $this->amenityRepository->createAmenities($request->all());
            return redirect()->route('amenityList')->with('successMsg','amenity name create success.');
        }catch(\Exception $e){
            abort(500);
        }
    }

    public function amenityList() {
        try{
            $amenityData   = $this->amenityRepository->getAmenities();
            return view('admin_backend/amenity/list',compact([
                'amenityData'
            ]));
        }catch(\Exception $e){
            abort(500);
        }
    }

    public function amenityEdit($id) {
        try{
            $amenityData   = $this->amenityRepository->editAmenities($id);
            return view('admin_backend/amenity/form',compact([
                'amenityData',
            ]));
        }catch(\Exception $e){
            abort(500);
        }
    }

    public function amenityUpdate(amenityUpdateRequest $request) {
        try{
            $this->amenityRepository->updateAmenities($request->all());
            return redirect()->route('amenityList')->with('updateMsg','amenity name update success');
        }catch(\Exception $e){
            abort(500);
        }
    }

    public function amenityDelete($id) {
        try{
            $this->amenityRepository->deleteAmenities($id);
            return redirect()->route('amenityList')->with('deleteMsg','amenity name deleted');
        }catch(\Exception $e){
            abort(500);
        }
    }
}
