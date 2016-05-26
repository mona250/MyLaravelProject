<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'name'=>'required|max:100',
            'lastname'=> 'required|max:100',
            'username'=>'required|min:4|max:100',
            'photo'=> 'required|image|max:1024',
            'phone'=>'required|max:11',
            'day'=>'required',
            'month'=>'required',
            'year'=>'required',
            'email'=>'required|email',
            'password'=>'required|max:100|min:5|same:passwordconfirm',
            'passwordconfirm'=>'required|min:5',
            'gender'=>'required',
            'job'=>'required',
            'education'=>'required',
            'field_of_education'=>'required',
//            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
