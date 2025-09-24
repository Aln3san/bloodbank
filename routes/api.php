<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\GeneralController;
use App\Http\Controllers\Api\V1\PostController;
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

  // Routes for AuthController
  Route::post('register', [AuthController::class, 'register']);
  Route::post('login', [AuthController::class, 'login']);
  Route::group(['middleware' => 'auth:api'], function() {
    Route::get('posts', [PostController::class, 'posts']);
    Route::get('post/{id}', [PostController::class, 'post']);
  });
});
