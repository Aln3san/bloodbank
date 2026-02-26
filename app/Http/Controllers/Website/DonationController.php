<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\DonationRequest as WebsiteDonationRequest;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\BloodType;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Base query with eager loads
        $query = DonationRequest::with(['bloodType', 'city']);

        // Apply filters from GET params
        if ($request->filled('blood_type')) {
            $query->where('blood_type_id', $request->input('blood_type'));
        }

        if ($request->filled('city')) {
            $query->where('city_id', $request->input('city'));
        }

        $donations = $query->paginate(10);
        // Preserve filter params in pagination links
        $donations->appends($request->only(['blood_type', 'city']));

        $cities = City::all();
        // Provide canonical list of blood types (used in the form)
        $blood_types = BloodType::all();

        return view('website.donation.index', compact('donations', 'cities', 'blood_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $blood_types = BloodType::all();
        return view('website.donation.create', compact('cities', 'blood_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WebsiteDonationRequest $request)
    {
        $data = $request->validated();
        auth('website')->user()->donationRequests()->create($data);
        return redirect()->route('website.donations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donation = DonationRequest::with(['bloodType', 'city'])->findOrFail($id);
        return view('website.donation.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
