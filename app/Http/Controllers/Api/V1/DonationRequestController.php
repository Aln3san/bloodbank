<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequest as ApiDonationRequest;
use App\Models\Client;
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
  
  public function store(ApiDonationRequest $request){
    $donationRequest = $request->user()->donationRequests()->create($request->validated());

    // send notification according to notification settings
    $clients = Client::whereHas('bloodTypes', function($query) use ($donationRequest) {
      $query->where('blood_type_id', $donationRequest->blood_type_id);
    })->whereHas('governorates', function ($query) use ($donationRequest){
      $query->where('governorate_id', $donationRequest->governorate_id);
    })->pluck('id')->toArray();

    // create notification
    $notification  = $donationRequest->notifications()->create([
      'title' => 'New Donation Request',
      'message' => 'A new donation request has been created in your area.',
      'client_id' => $request->user()->id,
    ]);

    if (!empty($clients)) {
      $notification->clients()->attach($clients);

      // push fcm notification (Firebase Cloud Messaging)
      // get tokens for each client
      // push notification to each token
    }

    $data = [
      'donation_request' => $donationRequest,
    ];
    return $this->successResponse($data, 'Donation Request Created Successfully', 201);
  }
}
