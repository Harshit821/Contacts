<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        //dd("heello");
        return [
            //
            'name' => 'required|max:50',
            'mobile1' => 'required|min:3|max:12',
            'mobile2' => 'required|min:3|max:12',
            'mobile3' => 'required|min:3|max:12',
            'email' => 'nullable|max:150|email',
            'address'=>'max:150',
            'social'=>'max:150|url',
            'birthdate'=>'',
            'notes' => 'max:200'
        ];
    }
    public function messages()
    {
        //dd("hello");
        //dump("plz check your details");
        return [
            
            'name.required' => 'Name is required!',
            'email.email' => 'Email123 is required!',
            
            //'password.required' => 'Password is required!'
        ];
    }
}
