<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
        $rules = [
            'username' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'password' => 'required|min:6',
                'email' => 'required|unique:users'
            ];
        }else{
            $rules += [
                'email' => 'required', Rule::unique('users')->ignore($this->user)
            ];
        }
        return $rules;
    }
}
