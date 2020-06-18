<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorie extends Model
{
    public function produits(){
        return $this->belongsToMany('App\Models\Produit','produits_favories');
    }

    public function client(){
        return $this->belongsTo("App\Models\Client");
    }
}
