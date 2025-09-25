<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\GeneralController;
use App\Http\Controllers\Api\V1\NotificationController;
use App\Http\Controllers\Api\V1\PostController;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::prefix('v1')->group(function () {
  // Routes for GeneralController
  Route::get('blood-types', [GeneralController::class, 'bloodTypes']);
  Route::get('governorates', [GeneralController::class, 'governorates']);
  Route::get('cities', [GeneralController::class, 'cities']);
  Route::get('settings', [GeneralController::class, 'settings']);
  Route::get('contact', [GeneralController::class, 'contact']);

  // Routes for AuthController
  Route::post('register', [AuthController::class, 'register']);
  Route::post('login', [AuthController::class, 'login']);
  Route::group(['middleware' => 'auth:api'], function() {
    // Posts Routes
    Route::get('posts', [PostController::class, 'posts']);
    Route::get('post/{id}', [PostController::class, 'post']);
    // Notifications Routes
    Route::get('notifications', [NotificationController::class, 'notifications']);
  });
});
