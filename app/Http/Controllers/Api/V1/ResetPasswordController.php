<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForgotPasswordRequest;
use App\Http\Requests\Api\ResetPasswordRequest;
use App\Mail\SendSendPassword;
use App\Models\Client;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
  use ApiResponse;

  public function forgotPassword(ForgotPasswordRequest $request)
  {
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


  public function resetPassword(ResetPasswordRequest $request)
  {
    // validate the request [phone, verification_code, new_password, new_password_confirmation]

    $client = Client::where('phone', $request->phone)->first();

    // check if the verification code matches and is not expired
    if (
      !$client ||
      $client->verification_code !== $request->verification_code ||
      $client->verification_code_expires_at < now()
    ) {
      return $this->errorResponse('Invalid or expired verification code', 422);
    }

    // update the password, clear the verification code and its expiration time
    $client->password = bcrypt($request->new_password);
    $client->verification_code = null;
    $client->verification_code_expires_at = null;
    $client->save();

    // return response
    return $this->successResponse([
      'message' => 'Password has been reset successfully',
      'client' => $client
    ]);
  }
}
