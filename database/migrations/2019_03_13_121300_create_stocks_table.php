<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference');
            $table->string('designation');
            $table->string('nomenclature');
            $table->string('type');
            $table->string('unite');
            $table->float('delai_semaine');
            $table->float('prix_standard');
            $table->string('lot_reaprvs');
            $table->float('stock_min');
            $table->float('stock_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
