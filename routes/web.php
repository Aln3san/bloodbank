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
use App\Http\Controllers\Admin\SettingAppController;
use App\Http\Controllers\Website\Auth\LoginController;
use App\Http\Controllers\Website\Auth\ProfileController;
use App\Http\Controllers\Website\Auth\RegisterController;
use App\Http\Controllers\Website\DonationController;
use App\Http\Controllers\Website\FavoriteController;
use App\Http\Controllers\Website\GeneralController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PostController as WebsitePostController;
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

// Lang Route
Route::get('lang/{locale}', function ($locale) {

    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('change.language');



// Website Routes
Route::group(['as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // General Routes
    Route::get('about', [GeneralController::class, 'about'])->name('about');
    Route::get('contact', [GeneralController::class, 'contact'])->name('contact');
    // contact store will be available only for authenticated website clients
    Route::post('contact', [GeneralController::class, 'contactStore'])->name('contact.store')->middleware('auth:website');
    // Auth Routes
    Route::get('register', [RegisterController::class, 'registerView'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
    Route::get('login', [LoginController::class, 'loginView'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::group(['middleware' => 'auth:website'], function () {
        // posts
        Route::resource('posts', WebsitePostController::class)->only(['index', 'show']);
        // my favourite
        Route::get('/favorites', [FavoriteController::class, 'index'])->middleware('auth:website')->name('favorites.index');
        Route::post('/posts/{post}/favorite', [FavoriteController::class, 'toggle'])->middleware('auth:website')->name('posts.favorite');
        // profile
        Route::resource('profile', ProfileController::class)->only(['edit', 'update']);
        // donation request
        Route::resource('donations', DonationController::class);
    });
});


// Routes Admin Dashboard
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
        Route::resource('donations', AdminDonationRequestController::class);
        Route::resource('settings', SettingAppController::class);
    });
});
