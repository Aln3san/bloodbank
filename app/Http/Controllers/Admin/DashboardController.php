<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $clientsCount = Client::count();
    $governoratesCount = Governorate::count();
    $citiesCount = City::count();
    $categoriesCount = Category::count();
    return view('admin.dashboard', compact('clientsCount', 'governoratesCount', 'citiesCount', 'categoriesCount'));
  }
}
