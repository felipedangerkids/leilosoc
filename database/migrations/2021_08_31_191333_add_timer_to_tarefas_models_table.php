<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimerToTarefasModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefa_models', function (Blueprint $table) {
            $table->string('evento')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->time('tempo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarefa_models', function (Blueprint $table) {
            //
        });
    }
}
