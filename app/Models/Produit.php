<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nomP', 'prix','quantite','dateExp','id_cat','fourn_id'];


    public function cate(){
    	return $this->belongsTo('App\Models\Categorie','id_cat');
    }
    public function fourn(){
    	return $this->belongsTo('App\Models\Fournisseur','fourn_id');
    }
}
