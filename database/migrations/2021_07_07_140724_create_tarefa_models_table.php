<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefa_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('modelo')->nullable();
            $table->text('description');
            $table->integer('departamento_id');
            $table->integer('user_id');
            $table->date('inicio');
            $table->date('fim');
            $table->string('cep');
            $table->string('morada');
            $table->string('porta');
            $table->string('regiao');
            $table->string('distrito');
            $table->string('conselho');
            $table->string('freguesia');
            $table->string('path');
            $table->string('compartilhar');


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
        Schema::dropIfExists('tarefa_models');
    }
}
