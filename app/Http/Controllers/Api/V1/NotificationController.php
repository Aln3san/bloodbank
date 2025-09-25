<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  use ApiResponse;

  public function notifications(){
    $notifications = Notification::all();
    $data = [
      'Notifications' => $notifications
    ];
    return $this->successResponse($data, 'Notifications Retrieved Successfully', 200);
  }
}
