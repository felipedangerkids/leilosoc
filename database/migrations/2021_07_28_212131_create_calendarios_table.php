<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            $table->string('processo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('consultora')->nullable();
            $table->string('asset')->nullable();
            $table->string('visitas')->nullable();
            $table->date('entrada')->nullable();
            $table->string('vender')->nullable();
            $table->string('reducao')->nullable();
            $table->string('estado')->nullable();
            $table->string('comunicacoes')->nullable();
            $table->string('pro_online')->nullable();
            $table->string('cat_online')->nullable();
            $table->text('obs')->nullable();
            $table->date('data_com')->nullable();
            $table->date('data_pro')->nullable();
            $table->date('data_cat')->nullable();
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
        Schema::dropIfExists('calendarios');
    }
}
