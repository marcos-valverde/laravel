<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255|unique:clients',
            'password' => 'required|min:6|max:16',
        ];

        return $rules;
    }
}