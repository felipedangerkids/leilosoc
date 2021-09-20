<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->integer('citius_id');
            $table->string('numero_processo');
            $table->string('referencia');
            $table->integer('tipo_processo_id');
            $table->date('data_entrada')->nullable();
            $table->date('data_auto_penhora')->nullable();
            $table->integer('comarca_id')->nullable();
            $table->integer('tribunal_id')->nullable();
            $table->integer('consultor_id')->nullable();
            $table->integer('asset_id')->nullable();
            $table->string('titular_processo')->nullable();
            $table->string('entidade');
            $table->integer('adm_insolvencia_id');
            $table->integer('moeda_id');
            $table->integer('pais_id');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('processos');
    }
}
