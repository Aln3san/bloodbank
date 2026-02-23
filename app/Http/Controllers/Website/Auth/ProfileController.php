<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ProfileRequst;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     * If no id is provided, use the authenticated user's id.
     */
    public function edit(?string $id = null)
    {
        // Prefer an explicitly supplied id, otherwise use the authenticated user id
        $id = $id ?? auth('website')->id();

        $governorates = Governorate::all();

        return view('website.auth.profile', compact('id', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequst $request)
    {
        $user = auth('website')->user();

        $data = $request->validated();

        // Hash password if provided, otherwise remove it from data so it's not set to null
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('website.home', $user->id);
    }

}