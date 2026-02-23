<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'phone' => [
                'required',
                'string',
                'max:30',
                Rule::unique('clients', 'phone')
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed'
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('clients', 'email')
            ],

            'date_of_birth' => ['nullable', 'date'],

            'blood_type_id' => [
                'nullable',
                'integer',
                'exists:blood_types,id'
            ],

            'last_donation_date' => [
                'nullable',
                'date',
                'before_or_equal:today'
            ],

            'city_id' => [
                'nullable',
                'integer',
                'exists:cities,id'
            ],
        ];
    }

    public function attributes(): array
    {
        $attrs = [];
        $client = new Client();

        foreach ($client->getFillable() as $field) {
            $attrs[$field] = ucwords(str_replace('_', ' ', $field));
        }

        return $attrs;
    }
}