<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create donations')->only(['create', 'store']);
        $this->middleware('permission:read donations')->only(['index', 'show']);
        $this->middleware('permission:update donations')->only(['edit', 'update']);
        $this->middleware('permission:delete donations')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only(['patient_name','patient_phone','blood_type_id','city_id']);

        $donations = DonationRequest::when($filters['patient_name'] ?? null, fn($q, $v) => $q->where('patient_name', 'like', "%{$v}%"))
            ->when($filters['patient_phone'] ?? null, fn($q, $v) => $q->where('patient_phone', 'like', "%{$v}%"))
            ->when($filters['blood_type_id'] ?? null, fn($q, $v) => $q->where('blood_type_id', $v))
            ->when($filters['city_id'] ?? null, fn($q, $v) => $q->where('city_id', $v))
            ->orderBy('id','desc')
            ->paginate(10)
            ->appends($filters);

        $bloodTypes = BloodType::all();
        $cities = City::all();

        return view('admin.donations.index', compact('donations','filters','bloodTypes','cities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donation = DonationRequest::findOrFail($id);
        $bloodTypes = BloodType::all();
        $cities = City::all();

        return view('admin.donations.show', compact('donation', 'bloodTypes', 'cities'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donation = DonationRequest::findOrFail($id);
        $donation->delete();
        // return redirect()->route('donatsions.index')->with( __("messages.item_deleted"));
        return response()->json( [
            'message' => __("message.item_deleted")
        ]);
    }
}
