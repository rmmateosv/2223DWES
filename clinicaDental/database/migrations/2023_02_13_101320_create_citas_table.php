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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('paciente')->nullable(false);
            $table->foreign('paciente')
                    ->references('dni')
                    ->on('pacientes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->integer('dentista')->nullable(false);
            $table->foreign('dentista')->references('numCol')
                    ->on('dentistas')
                    ->onDelete('restrict')
                    ->onUpdate('cascade')
                    ->nullable(false);
            $table->dateTime('fecha')->nullable(false);
            $table->string('motivo')->nullable(false);
            $table->string('diagnostico')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
