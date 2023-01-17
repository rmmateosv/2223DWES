<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coches', function (Blueprint $table) {
            //
            //Creamos campo color que admite nulos
            $table->string("color")->nullable(true);
            $table->foreignId("propietario_id")
            ->constrained()->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coches', function (Blueprint $table) {
            //
        });
    }
};
