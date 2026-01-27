<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
    // Allow all authorized users to make this request.
    // Change to specific permission checks if needed, e.g. auth()->user()->can('update-settings')
    return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'about_app' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'fb_url' => 'nullable|url|max:255',
            'x_url' => 'nullable|url|max:255',
            'insta_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
        ];
    }
}
