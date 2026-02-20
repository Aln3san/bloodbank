<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::latest()->take(5)->get();
        $donationQuery = DonationRequest::latest();

        if ($request->filled('blood_type')) {
            $donationQuery->where('blood_type_id', $request->input('blood_type'));
        }

        if ($request->filled('city')) {
            $donationQuery->where('city_id', $request->input('city'));
        }

        $donations = $donationQuery->take(5)->get();

        $bloodTypes = BloodType::all();
        $cities = City::all();

        return view('website.home', compact('posts', 'donations', 'bloodTypes', 'cities'));
    }
}
