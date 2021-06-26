<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductVerifyRequest extends FormRequest
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

            'name' => 'required|max:50',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'tags' => 'required'

        ];
    }

    public function messages()
    {
        return [


        ];
    }
}
