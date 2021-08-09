<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormProduit extends FormRequest
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
            'nomP'=>['required','unique:produits'],
            'quantite'=>'required',
            'prix'=>'required',
            'dateExp'=>['required'],
            'id_cat'=>['required','exists:App\Models\Categorie,id'],
            'fourn_id'=>['required','exists:App\Models\Fournisseur,id'],
        ];
    }
}
