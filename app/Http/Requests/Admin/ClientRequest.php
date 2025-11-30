<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:clients,phone',
            'email' => 'required|string|email|max:255|unique:clients,email',
            'password' => 'required|string|min:8|confirmed',
            'date_of_birth' => 'required|date',
            'blood_type_id' => 'required|exists:blood_types,id',
            'last_donation_date' => 'required|date',
            'city_id' => 'required|exists:cities,id',
        ];
    }
}
