<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['nom_f', 'prenom_f', 'adresse_f', 'email_f', 'phone_f','user_id'];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
