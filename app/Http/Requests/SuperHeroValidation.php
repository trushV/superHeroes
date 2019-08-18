<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperHeroValidation extends FormRequest
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
            'nickname'=> 'required',
            'real_name' => 'required',
            'superpowers'=>'required',
            'catch_phrase'=>'required',
            'origin_description'=> 'required',
            'fileMulti'=>'nullable',
            'image'=> 'nullable'
        ];
    }
}
