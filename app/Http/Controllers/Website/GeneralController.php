<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Requests\Website\ContactRequest;
use App\Models\Contact;

class GeneralController extends Controller
{
    public function about(){
        $about = Settings::first();
        return view('website.general.about', compact('about'));
    }
    public function contact(){
        return view('website.general.contact_us');
    }

    public function contactStore(ContactRequest $request)
    {
        $data = $request->only(['subject', 'message']);
        // associate with authenticated website client
        $data['client_id'] = auth('website')->id();

        Contact::create($data);

        return redirect()->back()->with('success', __('messages.contact_saved'));
    }
}
