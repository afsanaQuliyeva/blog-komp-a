<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
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
            'category_name' =>'required|max:255|min:2|unique:categories' ,
            'slug' => 'required|max:255'
        ];
    }


    public function messages()
    {
        return [
            'category_name.required' => 'Kateqoriya boş olmaz.',
            'slug.required' => 'Slug sahəsi boş olmaz.',
            'category_name.min' => 'Ən az 2 simvol daxil etməlisiniz'
        ];
    }
}
