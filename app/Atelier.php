<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    protected $table = 'ateliers';
    protected $fillable = ['libelle', 'effectif', 'commentaire'];

    public function operation()
    {
        return $this->belongsTo('App\Operation');
    }

}
