<?php

namespace App\Http\Requests\Dashboard\Admin;

class ProductStoreRequest extends ProductBaseRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'pic' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);
    }
}
