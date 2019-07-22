<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFromRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'user_address' => 'required|string|min:5',
            'user_phone' => 'required|int|min:5',
        ];
    }
}
