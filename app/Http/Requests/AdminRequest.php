<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class AdminRequest extends FormRequest
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
//        $id = ($this->auth()->id);
//        dd($this->request->all());
        return [
            'username' => 'required|string|max:100',
            'password' => 'required|string|min:6|max:20|confirmed',
            'email' => 'required|unique:admin|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'gender' => 'required',
            'id_card' => 'required',
            'tel' => 'required||max:10',
            'birthday' => 'required',
            'address' => 'required|string|max:255',
            'salary' => 'required',
        ];
    }
}
