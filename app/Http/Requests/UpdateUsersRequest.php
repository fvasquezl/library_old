<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsersRequest extends FormRequest
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
        $rules =[
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
                'string','max:255',
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
                'string','email','max:255'
            ],
            'position' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
                'string','min:3'
            ],
            'area_id' => ['required']
        ];

        if($this->filled('password'))
        {
            $rules['password'] =['confirmed', 'min:6'];
        }
        return $rules;
    }
}
