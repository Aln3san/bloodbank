<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Client;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller {

  use ApiResponse;

  public function showProfile(){
    $profile = Client::find(auth()->user()->id);
    $data = [
      'Profile' => $profile,
    ];
    return $this->successResponse($data, 'Profile Retrieved Successfully', 200);
  }

  public function updateProfile(RegisterRequest $request){
    $profile = Client::find(auth()->user()->id);
    $profile->update($request->all());
    $data = [
      'Profile' => $profile,
    ];
    return $this->successResponse($data, 'Profile Updated Successfully', 200);
  }
}
