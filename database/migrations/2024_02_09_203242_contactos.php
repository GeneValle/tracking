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
        Schema::create('contactos', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();

            $table->id();
            $table->string('funeraria');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('correo');
            $table->string('telefono');
            $table->string('celular');
            $table->text('referenciado');
            $table->string('origen');
            $table->date('fechaNacimiento');
            $table->date('fechaIngreso');
            $table->date('vigencia');
            $table->string('profesion');
            $table->unsignedBigInteger('empresas_id');
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->integer('ingresos');
            $table->string('calle');
            $table->integer('noExterior');
            $table->string('noInterior');
            $table->unsignedBigInteger('colonias_id');
            $table->foreign('colonias_id')->references('id')->on('colonias');
            $table->string('localidad');
            $table->string('municipio');
            $table->string('estado');
            $table->string('pais');
            $table->integer('codPostal');
            $table->text('observaciones');

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
        Schema::dropIfExists('contactos');
    }
};
