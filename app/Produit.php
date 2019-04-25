<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';
    protected $fillable = ['libelle', 'client_id', 'pourcentage', 'date_debut', 'date_fin'];

    public function ordre_fabrications()
    {
        return $this->hasMany('App\Ordre_fabrication');
    }

    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
}
