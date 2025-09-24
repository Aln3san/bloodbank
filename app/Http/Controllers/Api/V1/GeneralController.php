<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BloodType as BloodTypes;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Settings;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
  use ApiResponse;

  public function bloodTypes()
  {
    $bloodTypes = BloodTypes::all();
    $data = ['Blood_types' => $bloodTypes];
    return $this->successResponse($data, 'Get Blood Types api Successfully', 200);
  }
  // test

  public function governorates()
  {
    $governorates = Governorate::all();
    $data = ['Governorates' => $governorates];
    return $this->successResponse($data, 'Get Governorates api Successfully', 200);
  }

  public function cities(Request $request)
  {
    $cities = City::where(function($query) use($request){
      if(request()->has('governorate_id')){
        $query->where('governorate_id', $request->governorate_id);
      }
    })->get();
    $data = ['Cities' => $cities];
    return $this->successResponse($data, 'Get Cities api Successfully', 200);
  }

  public function settings(){
    $settings = Settings::all();
    $data = ['Settings' => $settings];
    return $this->successResponse($data, 'Get Settings api Successfully', 200);
  }

  public function contact(){
    $contact = Contact::all();
    $data = ['Contact' => $contact];
    return $this->successResponse($data, 'Get Contact api Successfully', 200);
  }
}