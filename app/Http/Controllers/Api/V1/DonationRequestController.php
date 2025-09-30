<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequest as ApiDonationRequest;
use App\Models\DonationRequest;
use App\Traits\ApiResponse;;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
  use ApiResponse;
  public function index(){
    $donationRequests = DonationRequest::with('city', 'bloodType')->get();
    $data = [
      'Donation_requests' => $donationRequests,
    ];
    return $this->successResponse($data, 'Donation Requests Fetched Successfully');
  }

  public function show($id){
    $donationRequest = DonationRequest::with('city', 'bloodType')->find($id);
    if(!$donationRequest){
      return $this->errorResponse('Donation Request Not Found', 404);
    }
    $data = [
      'donation_request' => $donationRequest,
    ];
    return $this->successResponse($data, 'Donation Request Fetched Successfully');
  }

  public function createDonation(ApiDonationRequest $request){
    $donationReqeust = $request->user->donationRequests()->create($request->validated());
  }

  public function store(){
    //
  }
}
