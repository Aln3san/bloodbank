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
    $data = [
      'client' => $client,
      'token' => $token->plainTextToken
    ];

    return $this->successResponse($data, 'Client Registered Successfully', 201);
  }

  public function login(LoginRequest $request)
  {
    $client = Client::where('phone', $request->phone)->first();
    if (!$client || !Hash::check($request->password, $client->password)) {
      return $this->errorResponse('The provided credentials are incorrect.', 401);
    }
    $token = $client->createToken('ApiToken');
    // if fcm token provided, save it to the client
    if ($request->filled('fcm_token')) {
      $accessToken = $token->accessToken;
      $accessToken->fcm_token = $request->fcm_token;
      $accessToken->save();
    }
    $data = [
      'client' => $client,
      'token' => $token->plainTextToken
    ];
    return $this->successResponse($data, 'Client Logged in Successfully', 200);
  }
}
