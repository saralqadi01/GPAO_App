<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class audit extends Model
{
    protected $table = 'audit';
    protected $fillable = ['produit_id', 'pourcentage', 'changetype', 'changetime'];
}
