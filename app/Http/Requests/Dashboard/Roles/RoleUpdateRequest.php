<?php

namespace App\Http\Requests\Dashboard\Roles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name'              => ['required', Rule::unique('roles','name')->ignore($this->role)],
            'permissions'       => ['required', 'exists:permissions,id'],
            'permissions.*'     => ['required', 'exists:permissions,id'],
        ];
    }
}