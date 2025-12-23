<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user') ?? $this->route('id') ?? null;

        // Build unique email rule as string and append ignore id when updating
        $emailRule = 'required|string|email|max:255|unique:users,email';
        if ($userId) {
            $emailRule .= ',' . $userId;
        }

        // On create password is required, on update it's nullable
        $passwordRule = $userId ? 'nullable|string|min:8|confirmed' : 'required|string|min:8|confirmed';

        return [
            'name' => 'required|string|max:255',
            'email' => $emailRule,
            'password' => $passwordRule,
            // expect role name, not id
            'role' => 'required|string|exists:roles,name',
        ];
    }
}
