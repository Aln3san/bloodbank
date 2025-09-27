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

  public function store(ApiDonationRequest $request){
    $donationRequest['client_id'] = auth()->user()->id;
    $donationRequest = DonationRequest::create($request->validated());
    $data = [
      'donation_request' => $donationRequest,
    ];
    return $this->successResponse($data, 'Donation Request Created Successfully');
  }
}
