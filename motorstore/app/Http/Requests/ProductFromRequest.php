<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFromRequest extends FormRequest
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
            'pdname' => 'required|min:3',
            'plate' => 'required',
            'color' => 'required',
            'detail' => 'required',
            'year' => 'required',
            'price' => 'required',

        ];
    }
}
