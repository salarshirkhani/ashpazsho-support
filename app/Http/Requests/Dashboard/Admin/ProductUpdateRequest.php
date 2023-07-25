<?php

namespace App\Http\Requests\Dashboard\Admin;

class ProductUpdateRequest extends ProductBaseRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'photo' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);
    }
}
