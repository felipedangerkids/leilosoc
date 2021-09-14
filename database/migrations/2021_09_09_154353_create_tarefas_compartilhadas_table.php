<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasCompartilhadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas_compartilhadas', function (Blueprint $table) {
            $table->id();
            $table->string('tarefa_id');
            $table->string('tarefa_email');
            $table->text('tarefa_texto');
            $table->string('tarefa_link');
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
        Schema::dropIfExists('tarefas_compartilhadas');
    }
}
