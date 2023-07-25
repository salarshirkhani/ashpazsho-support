<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Http\Requests\SplitsKeywords;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class ProductBaseRequest extends FormRequest
{
    use SplitsKeywords;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'explain' => ['required', 'string', 'max:2000'],
            'content' => ['required', 'string', 'max:20000'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'category_id' => ['nullable', 'numeric', 'min:0'],
            'keywords' => ['required', 'regex:/^[^,]+(\s*\,\s*[^,]+)*$/'],
        ];
    }

    public function validated()
    {
        $data = parent::validated();
        return $this->addKeywordsToData($data);
    }
}
