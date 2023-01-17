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
        Schema::create('pieza_reparaciones', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId("reparacion_id")
                  ->references("id")->on('reparaciones')
                  ->constrained()->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->foreignId("pieza_id")
                  ->references("id")->on('piezas')
                  ->constrained()->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->integer("cantidad");
            $table->float("importe");
            $table->primary(['reparacion_id','pieza_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pieza_reparaciones');
    }
};
