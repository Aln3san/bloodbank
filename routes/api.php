<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DonationRequestController;
use App\Http\Controllers\Api\V1\FavouretController;
use App\Http\Controllers\Api\V1\GeneralController;
use App\Http\Controllers\Api\V1\NotificationController;
use App\Http\Controllers\Api\V1\NotificationSettingController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\ResetPasswordController;
use App\Models\DonationRequest;
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
  Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword']);
  Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);
  Route::group(['middleware' => 'auth:api'], function() {
    // Posts Routes
    Route::get('posts', [PostController::class, 'posts']);
    Route::get('post/{id}', [PostController::class, 'post']);
    // Notifications Route
    Route::get('notifications', [NotificationController::class, 'notifications']);
    Route::post('notification-settings', [NotificationSettingController::class, 'index']);
    // Profile Routes
    Route::get('profile', [ProfileController::class, 'showProfile']);
    Route::post('update-profile', [ProfileController::class, 'updateProfile']);
    // Favourites Routes
    Route::get('favourites', [FavouretController::class, 'listFavourites']);
    Route::post('toggle-favourite/{id}', [FavouretController::class, 'toggleFavourite']);
    // Donation Requests Routes
    Route::apiResource('donation-requests', DonationRequestController::class)->except(['update', 'destroy']);
  });
});
