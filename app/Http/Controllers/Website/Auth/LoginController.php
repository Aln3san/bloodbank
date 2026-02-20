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
            dd('here');
        if (auth('website')->attempt([
            'phone' => $request->phone,
            'password' => $request->password
        ])) {
            // dd('logged in');
            // Regenerate session to prevent session fixation attack
            // $request->session()->regenerate();

            // Redirect to home page after successful login
            // return redirect()->route('website.home');
        }
        // Authentication failed: return back with error message
        return back()->withErrors([
            'phone' => 'The provided credentials are incorrect.',
        ])->withInput();
    }
}
