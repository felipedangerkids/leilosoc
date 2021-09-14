<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddresInsolventesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insolventes', function (Blueprint $table) {
            $table->string('email')->after('user_id')->nullable();
            $table->string('codigo_postal')->after('email')->nullable();
            $table->string('morada')->after('codigo_postal')->nullable();
            $table->string('regiao')->after('morada')->nullable();
            $table->string('porta')->after('regiao')->nullable();
            $table->string('distrito')->after('porta')->nullable();
            $table->string('conselho')->after('distrito')->nullable();
            $table->string('freguesia')->after('conselho')->nullable();
            $table->string('latitude')->after('freguesia')->nullable();
            $table->string('longitude')->after('latitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insolventes', function (Blueprint $table) {
            //
        });
    }
}
