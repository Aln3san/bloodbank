<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Governorate;
use App\Models\City;
use App\Models\BloodType;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // read filters from query string
        $filters = request()->only(['name','phone','city_id','blood_type_id']);

        $clients = Client::with(['city:id,name','bloodType:id,name'])
            ->select('id','name','phone','email','city_id','blood_type_id','date_of_birth','last_donation_date')
            ->filter($filters)
            ->orderBy('id','desc')
            ->simplePaginate(15)
            ->appends($filters);

        $cities = City::select('id','name')->get();
        $blood_types = BloodType::select('id','name')->get();
        return view('admin.clients.index', compact('clients','cities','blood_types','filters'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $blood_types = BloodType::all();
        return view('admin.clients.create', compact('cities', 'blood_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        // set governorate_id from the chosen city
        if (!empty($data['city_id'])) {
            $city = City::find($data['city_id']);
            if ($city) $data['governorate_id'] = $city->governorate_id;
        }
        // hash password before saving
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        Client::create($data);
        return redirect()->route('clients.index')->with('success', __("messages.create_client"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $cities = City::all();
        $blood_types = BloodType::all();
        return view('admin.clients.edit', compact('client', 'cities', 'blood_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, string $id)
    {
        $client = Client::findOrFail($id);
        $data = $request->validated();
        // if password provided, hash it; otherwise remove so it won't be wiped
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        // set governorate_id from city if city changed
        if (!empty($data['city_id'])) {
            $city = City::find($data['city_id']);
            if ($city) $data['governorate_id'] = $city->governorate_id;
        }
        $client->update($data);
        return redirect()->route('clients.index')->with('success', __("messages.success"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        // return redirect()->route('governorates.index')->with( __("messages.item_deleted"));
        return response()->json([
            'message' => __("messages.item_deleted")
        ]);
    }
}
