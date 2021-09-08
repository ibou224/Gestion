<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'newUser.nom'=>'require',
            'newUser.prenom'=>'require',
            'newUser.email'=>'require|email',
            'newUser.phone'=>'require|number',
            'newUser.adresse'=>'require'
        ];
    }
}
