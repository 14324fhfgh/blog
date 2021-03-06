<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreBrandPost extends FormRequest
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
            'brand_name' => 'required|unique:brand|max:255',
             //'body' => 'required',
        ];
    }
    public function messages()
    { 
        return [ 
            'brand_name.required'=>'用户名必填',
            'brand_name.unique'=>'用户名已存在',
        ]; 
    }
}
