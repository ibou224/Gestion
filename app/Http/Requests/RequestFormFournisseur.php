<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormFournisseur extends FormRequest
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
            'nom_f'=>'required',
            'prenom_f'=>'required',
            'adresse_f'=>'required',
            'email_f'=>['required','unique:fournisseurs','email'],
            'phone_f'=>['required','unique:fournisseurs'],
        ];
    }
}
