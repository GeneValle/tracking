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
        Schema::create('cotizaciones', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();

            $table->id();
            $table->unsignedBigInteger('productos_id');
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->integer('descuento');
            $table->text('observaciones');
            $table->text('fecha');
            $table->integer('total');
            $table->text('estado');
            $table->text('envios');
            $table->text('visitas');

            $table->unsignedBigInteger('contactos_id');
            $table->foreign('contactos_id')->references('id')->on('contactos');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->timestamps();

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
