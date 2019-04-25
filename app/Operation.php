<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operations';
    protected $fillable = ['num_operation', 'produit_id', 'atelier_id', 'poste_charge_id', 'temps_preparation', 'temps_execution', 'temps_transfert', 'libelle_operation', 'h_debut', 'h_fin', 'commentaire'];

    public function atelier()
    {
        return $this->hasOne('App\Atelier');
    }

    public function poste_charge()
    {
        return $this->hasMany('App\Poste_charge');
    }
}
