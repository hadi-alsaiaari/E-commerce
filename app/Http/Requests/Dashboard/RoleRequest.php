<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    // protected $stopOnFirstFailure = true;

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
        $id = (int)$this->segment(4);
        $permissions_keys = array_keys(app('permissions'));
        return [
            'role.*' => ['required', 'string', 'max:100', UniqueTranslationRule::for('roles')->ignore($id)],
            'permissions' => ['required', 'array', 'min:1', 'max:' . count($permissions_keys)],
            'permissions.*' => ['required', 'integer', 'distinct', 'in:' . implode(',', $permissions_keys)],
            'checked_all' => ['sometimes', 'required', 'string', 'in:on,off', 'min:2', 'max:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'permissions.required' => __('permissions.required_permission'),
            'permissions.array' => __('permissions.array_permission'),
            'permissions.min' => __('permissions.min_permission'),
            'permissions.max' => __('permissions.max_permission'),
            'permissions.*.required' => __('permissions.required_permission'),
            'permissions.*.integer' => __('permissions.integer_permission'),
            'permissions.*.distinct' => __('permissions.distinct_permission'),
            'permissions.*.in' => __('permissions.in_permission'),
        ];
    }
}
