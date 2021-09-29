<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('processo_id');
            $table->string('numero')->nullable();
            $table->string('referencia')->nullable();
            $table->float('valor_abertura')->nullable();
            $table->float('valor_minimo')->nullable();
            $table->float('valor_base')->nullable();
            $table->float('valor_venda')->nullable();
            $table->string('estimativa_minima')->nullable();
            $table->string('estimativa_maxima')->nullable();
            $table->string('iva')->nullable();
            $table->string('moeda')->nullable();
            $table->string('estado_licitacao')->nullable();
            $table->dateTime('data_fim')->nullable();
            $table->dateTime('data_fim_efetiva')->nullable();
            $table->string('publicar')->nullable();
            $table->string('vendido')->nullable();
            $table->string('venda_anulada')->nullable();
            $table->string('destaque')->nullable();
            $table->string('bolsa_imoveis')->nullable();
            $table->string('faturado')->nullable();
            $table->string('pago')->nullable();
            $table->string('venda_realizada')->nullable();
            $table->string('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->string('subtitulo')->nullable();
            $table->text('breve_descricao')->nullable();
            $table->string('autor')->nullable();
            $table->string('curador')->nullable();
            $table->string('especialista')->nullable();
            $table->string('vendedor')->nullable();
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
        Schema::dropIfExists('lotes');
    }
}
