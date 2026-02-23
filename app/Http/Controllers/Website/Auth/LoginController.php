<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\LoginReqeust;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:website')->except('logout');
    }

    public function loginView()
    {
        return view('website.auth.login');
    }

    public function login(LoginReqeust $request)
    {
        // validation
        // Attempt to login using email & password
        if (auth('website')->attempt([
            'phone' => $request->phone,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            return redirect()->route('website.home');
        }
        // Authentication failed: return back with error message
        return back()->withErrors([
            'phone' => 'The provided credentials are incorrect.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        auth('website')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('website.home');
    }
}
