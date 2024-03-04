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
        Schema::create('empresas', function (Blueprint $table){
            
            Schema::disableForeignKeyConstraints();

            $table->id();
            $table->string('nombreEmpresa');
            $table->string('giro',);
            $table->string('sitioWeb');
            $table->string('calle');
            $table->integer('noExterior');
            $table->string('noInterior');
            $table->unsignedBigInteger('colonias_id');
            $table->foreign('colonias_id')->references('id')->on('colonias');
            $table->string('ciudad');
            $table->string('municipio');
            $table->string('estado');
            $table->integer('codPostal');
            $table->string('pais');
            $table->text('observaciones');
            $table->timestamps();

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
