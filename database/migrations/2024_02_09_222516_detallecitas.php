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
        Schema::create('detallecitas', function (Blueprint $table){
            Schema::disableForeignKeyConstraints();
            
            $table->id();
            $table->date('fecha');
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->string('estado');
            $table->string('telefono');
            $table->string('correo');
            $table->text('observaciones');

            $table->unsignedBigInteger('contactos_id');
            $table->foreign('contactos_id')->references('id')->on('contactos');

            $table->unsignedBigInteger('citas_id');
            $table->foreign('citas_id')->references('id')->on('citas');
            
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('detallecontactos_id');
            $table->foreign('detallecontactos_id')->references('id')->on('detallecontactos');
            
            $table->timestamps();

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallecitas');
    }
};
