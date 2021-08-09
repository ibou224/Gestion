<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrer extends Model
{
    use HasFactory;

    protected $fillable = ['libele','qty_e', 'prix_e', 'fourn_id', 'id_user'];


     public function Fourn(){
        return $this->belongsTo('App\Models\Fournisseur','fourn_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','id_user');
    }
}
