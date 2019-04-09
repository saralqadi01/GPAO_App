<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['reference', 'designation', 'nomenclature', 'type', 'unité', 'delai_semaine', 'prix_standard', 'lot_reaprvs', 'stock_min', 'stock_max'];
}
