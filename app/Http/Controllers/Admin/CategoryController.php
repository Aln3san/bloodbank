<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.governorates.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(GovernorateRequest $request)
    // {
    //     Governorate::create($request->validated());
    //     return redirect()->route('governorates.index')->with('success', __("messages.create_governorate"));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $governorate = Governorate::findOrFail($id);
    //     return view('admin.governorates.edit', compact('governorate'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(GovernorateRequest $request, string $id)
    // {
    //     $governorate = Governorate::findOrFail($id);
    //     $governorate->update($request->validated());
    //     return redirect()->route('governorates.index')->with('success', __("messages.success"));
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $governorate = Governorate::findOrFail($id);
    //     $governorate->delete();
    //     // return redirect()->route('governorates.index')->with( __("messages.item_deleted"));
    //     return response()->json( [
    //         'message' => __("messages.item_deleted")
    //     ]);
    // }
}
