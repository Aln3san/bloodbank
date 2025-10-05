<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NotificationSettingRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
  use ApiResponse;

  public function index(NotificationSettingRequest $request)
  {
    $client = auth('sanctum')->user() ?? auth()->user();

    if (!$client) {
      return $this->errorResponse('Unauthenticated', 401);
    }

    try {
      if ($request->has('governorates')) {
        $client->governorates()->sync($request->input('governorates', []));
      }

      if ($request->has('blood_types')) {
        $client->bloodTypes()->sync($request->input('blood_types', []));
      }

      // reload relationships to reflect changes
      $client->loadMissing(['governorates', 'bloodTypes']);

      // Prepare response data
      $govNames   = collect($client->governorates)->pluck('name')->values()->all();
      $bloodNames = collect($client->bloodTypes)->pluck('name')->values()->all();

      $data = [
        'governorates' => $govNames,
        'blood_types'  => $bloodNames,
      ];

      return $this->successResponse($data, 'Notification settings updated successfully');
    } catch (\Throwable $e) {
      // Log the error for debugging
      \Log::error('NotificationSettings error', [
        'client_id' => $client->id ?? null,
        'message'   => $e->getMessage(),
        'trace'     => $e->getTraceAsString(),
      ]);

      return $this->errorResponse('Server error', 500);
    }
  }
}
