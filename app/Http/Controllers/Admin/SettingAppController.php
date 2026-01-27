<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all settings
        $settings = Settings::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Settings::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, string $id)
    {
        $setting = Settings::findOrFail($id);
        $setting->update($request->validated());
        return redirect()->route('settings.index')->with('success', __('messages.updated_successfully'));
    }
}
