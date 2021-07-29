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
            $table->text('description')->nullable();
            $table->integer('departamento_id');
            $table->integer('user_id');
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            $table->string('cep')->nullable();
            $table->string('morada')->nullable();
            $table->string('porta')->nullable();
            $table->string('regiao')->nullable();
            $table->string('distrito')->nullable();
            $table->string('conselho')->nullable();
            $table->string('freguesia')->nullable();
            $table->string('path')->nullable();
            $table->string('compartilhar')->nullable();


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
