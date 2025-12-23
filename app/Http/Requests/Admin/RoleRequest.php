<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $roleId = $this->route('role') ?? $this->route('id') ?? null;

        $nameRule = 'required|string|max:255|unique:roles,name';
        if ($roleId) {
            $nameRule .= ',' . $roleId;
        }

        return [
            'name' => $nameRule,
            'permissions' => 'nullable|array',
            // permissions will be submitted as permission names from the form
            'permissions.*' => 'exists:permissions,name',
        ];
    }
}
