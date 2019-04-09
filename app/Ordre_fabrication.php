<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordre_fabrication extends Model
{
    protected $table = 'ordre_fabrications';
    protected $fillable = ['libelle', 'produit_id', 'commentaire'];
}
