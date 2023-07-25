<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

abstract class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:60'],
            'description' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'regex:/^[a-zA-Z0-9-]+$/'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ];
    }

    public function validated()
    {
        return parent::validated();
    }
}
