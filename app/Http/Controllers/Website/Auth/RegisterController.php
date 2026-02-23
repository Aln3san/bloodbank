<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\RegisterRequest;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        // Prevent logged-in clients from accessing register page
        $this->middleware('guest:website');
    }

    public function registerView()
    {
    // Load governorates from model so the view can render them server-side
    $governorates = Governorate::all();
    $cities = collect();

    return view('website.auth.register', compact('governorates', 'cities'));
    }

    public function register(RegisterRequest $request)
    {
        // Create new client with validated data
        $client = Client::create([
            ...$request->validated(),
            'password' => Hash::make($request->password),
        ]);

        // Login client automatically after registration
        auth('website')->login($client);

        // Regenerate session for security
        $request->session()->regenerate();

        // Redirect to home page
        return redirect()->route('website.home')
            ->with('success', 'Account created successfully.');
    }
}