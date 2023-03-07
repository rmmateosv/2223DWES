<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha')->nullable(false);
            $table->foreignId('producto')
                    ->references('id')
                    ->on('productos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('cantidad')->nullable(false);
            $table->float('precioUnitario')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
