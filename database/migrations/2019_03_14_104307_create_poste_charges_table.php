<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosteChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poste_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_operation');
            $table->integer('num_section');
            $table->integer('num_soussection');
            $table->string('machine');
            $table->string('main_oeuvre');
            $table->string('designation');
            $table->float('taux_horaire_forfait');
            $table->integer('nbre_poste');
            $table->float('capacité_nominale');
            $table->text('commentaire');
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
        Schema::dropIfExists('poste_charges');
    }
}
