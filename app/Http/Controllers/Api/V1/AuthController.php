<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Client;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  use ApiResponse;

  public function register(RegisterRequest $request)
  {
    $data = $request->validated();
    $data['password'] = bcrypt($data['password']);
    $client = Client::create($data);
    $token = $client->createToken('ApiToken');
    if ($request->filled('fcm_token')) {
      $accessToken = $token->accessToken;
      $accessToken->fcm_token = $request->fcm_token;
      $accessToken->save();
    }
    $data = [
      'client' => $client,
      'token' => $token->plainTextToken
    ];

    return $this->successResponse($data, 'Client Registered Successfully', 201);
  }

  public function login(LoginRequest $request)
  {
    // Find client by phone number
    $client = Client::where('phone', $request->phone)->first();

    // Check if client exists and password is correct
    if (!$client || !Hash::check($request->password, $client->password)) {
      return $this->errorResponse('The provided credentials are incorrect.', 401);
    }

    // Create new API token using Sanctum
    $token = $client->createToken('ApiToken');

    // if fcm token provided, save it to the client
    if ($request->filled('fcm_token')) {
      $accessToken = $token->accessToken;
      $accessToken->fcm_token = $request->fcm_token;
      $accessToken->save();
    }

    // Prepare response data
    $data = [
      'client' => $client,
      'token' => $token->plainTextToken
    ];
    
    // Return success response with client data and token
    return $this->successResponse($data, 'Client Logged in Successfully', 200);
  }
}
