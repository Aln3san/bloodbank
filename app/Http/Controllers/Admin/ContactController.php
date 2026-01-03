<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:create contacts')->only(['create', 'store']);
        $this->middleware('permission:read contacts')->only(['index', 'show']);
        $this->middleware('permission:update contacts')->only(['edit', 'update']);
        $this->middleware('permission:delete contacts')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only(['subject','message']);

        $contacts = Contact::when($filters['subject'] ?? null, fn($q, $v) => $q->where('subject', 'like', "%{$v}%"))
            ->when($filters['message'] ?? null, fn($q, $v) => $q->where('message', 'like', "%{$v}%"))
            ->orderBy('id','desc')
            ->paginate(10)
            ->appends($filters);

        return view('admin.contacts.index', compact('contacts','filters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->validated());
        return redirect()->route('contacts.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        // return redirect()->route('contacts.index')->with( __("messages.item_deleted"));
        return response()->json( [
            'message' => __("messages.item_deleted")
        ]);
    }
}
