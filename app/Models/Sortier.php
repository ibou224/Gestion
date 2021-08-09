<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortier extends Model
{
    use HasFactory;

    protected $fillable = ['qty_sortie', 'prix_sortie', 'id_prod','id_user'];

    public function produits(){
    	return $this->belongsTo('App\Models\Produit','id_prod');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User','id_user');
    }
}
