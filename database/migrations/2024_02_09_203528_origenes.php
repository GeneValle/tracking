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
        Schema::create('origenes', function (Blueprint $table){
            Schema::disableForeignKeyConstraints();

            $table->id();
            $table->string('origen');

            $table->unsignedBigInteger('contactos_id');
            $table->foreign('contactos_id')->references('id')->on('contactos');

            $table->timestamps();

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origenes');
    }
};
