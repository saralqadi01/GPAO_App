<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operations';
    protected $fillable = ['num_operation', 'produit_id', 'atelier_id', 'num_poste_charge', 'temps_preparation', 'temps_execution', 'temps_transfert', 'libelle_operation', 'h_debut', 'h_fin', 'commentaire'];

    public function poste_charges()
    {
        return $this->belongsToMany('App\Poste_charges');
    }

    public function atelier()
    {
        return $this->hasOne('App\Atelier');
    }
}
