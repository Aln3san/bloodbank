<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonationRequestController as AdminDonationRequestController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DonationRequestController;
use App\Http\Controllers\Admin\SettingAppController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Routes Admin Dashboard
Route::get('/', function () {
    return redirect('admin');
});
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('governorates', GovernorateController::class);
        Route::resource('cities', CityController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('donations', DonationRequestController::class);
    Route::resource('settings', SettingAppController::class);
    });
});