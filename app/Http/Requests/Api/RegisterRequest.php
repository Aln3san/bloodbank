<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true; // Allow registration
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
      'phone' => 'required|numeric|unique:clients,phone',
      'password' => 'required|string|min:6|max:255|confirmed',
      'email' => 'required|email|max:255|unique:clients,email',
      'date_of_birth' => 'required|date',
      'blood_type_id' => 'required|integer|exists:blood_types,id',
      'last_donation_date' => 'required|date',
      'city_id' => 'required|integer|exists:cities,id',
    ];
  }
}
