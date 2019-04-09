<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['nom', 'prenom', 'adrs', 'num_tel', 'email'];

    public function produits()
    {
        return $this->hasMany('App\Produit');
    }

    
}
