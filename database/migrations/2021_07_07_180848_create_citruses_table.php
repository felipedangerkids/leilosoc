<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitrusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citruses', function (Blueprint $table) {
            $table->id();
            $table->string('tribunal')->nullable();
            $table->string('ato')->nullable();
            $table->string('referencia')->nullable();
            $table->string('processo')->nullable();
            $table->string('especie')->nullable();
            $table->string('data')->nullable();
            $table->string('data_propositura')->nullable();
            $table->string('insolvente')->nullable();
            $table->string('nif')->nullable();
            $table->string('adm_insolvencia')->nullable();
            $table->string('nif_adm')->nullable();
            $table->string('credor')->nullable();
            $table->string('nif_credor')->nullable();
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
        Schema::dropIfExists('citruses');
    }
}
