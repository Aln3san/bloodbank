<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForgotPasswordRequest;
use App\Mail\SendSendPassword;
use App\Models\Client;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
  use ApiResponse;

  public function forgotPassword(ForgotPasswordRequest $request) {
    $client = Client::where('phone', $request->phone)->first();
    // generate verification code
    $verificationCode = rand(100000, 999999);
    // save verification code to database
    $client->verification_code = $verificationCode;
    $client->verification_code_expires_at = now()->addMinutes(10);
    $client->save();
    // send verification code to SMS / Email
    Mail::to($client->email)->send(new SendSendPassword($client));
    // return response
    return $this->successResponse([
      'message' => 'Verification code sent to your phone.',
      'verification_code' => $verificationCode // remove this line in production
    ]);
  }


  public function resetPassword(Request $request) {
    // validate the request [phone, verification_code, new_password, new_password_confirmation]
    // check if the verification code is expired
    // update the password clear the verification code and its expiration time
    // return response
  }
}
