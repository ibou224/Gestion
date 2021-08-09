<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['id_prod','qty_s', 'id_user'];

    public function produit(){
    	return $this->belongsTo('App\Models\produit','id_prod');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','id_user');
    }
}
