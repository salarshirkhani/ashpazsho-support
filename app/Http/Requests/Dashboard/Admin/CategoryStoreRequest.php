<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Category;
use App\postcategory;

class CategoryStoreRequest extends CategoryRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    public function rules()
    {
        return parent::rules();
    }
}
