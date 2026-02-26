<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
    // Allow all visitors to make donation requests from the website.
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
            'patient_name'  => ['required', 'string', 'max:255'],
            'patient_age'   => ['required', 'integer', 'min:0', 'max:120'],
            'blood_type_id' => ['required', 'integer', 'exists:blood_types,id'],
            'bags_number'   => ['required', 'integer', 'min:1'],
            'hospital_name' => ['required', 'string', 'max:255'],
            'latitude'      => ['nullable', 'numeric'],
            'longitude'     => ['nullable', 'numeric'],
            'city_id'       => ['required', 'integer', 'exists:cities,id'],
            'patient_phone' => ['required', 'string', 'max:30'],
            'notes'         => ['nullable', 'string'],
        ];
    }
}
