<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $admin_id = $this->route('admin');
        $required = in_array($this->method() , ['PUT' , 'PATCH']) ? 'nullable' : 'required';
        return [
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin_id,
            'password' => $required . '|confirmed|min:8|max:255',
            'password_confirmation' => 'required_with:password',
            'name' => 'required|string|min:2|max:60',
            'status' => 'required|in:1,0',
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
