<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste_charge extends Model
{
    protected $table = 'poste_charges';
    protected $fillable = ['id_operation', 'num_section', 'num_soussection', 'machine', 'main_oeuvre', 'designation', 'taux_horaire_forfait', 'nbre_poste', 'capacité_nominale', 'commentaire'];

    
}

