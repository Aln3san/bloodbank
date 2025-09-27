<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
      'patient_name' => 'required|string|max:255',
      'patient_age' => 'required|integer|min:0',
      'blood_type_id' => 'required|exists:blood_types,id',
      'bags_number' => 'required|integer|min:1',
      'hospital_name' => 'required|string|max:255',
      'latitude' => 'required|numeric',
      'longitude' => 'required|numeric',
      'city_id' => 'required|exists:cities,id',
      'patient_phone' => 'required|string|max:20',
      'notes' => 'nullable|string',
      'client_id' => 'required|exists:clients,id',
    ];
  }
}
