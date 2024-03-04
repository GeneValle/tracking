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
        Schema::create('descartados', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();

            $table->id();
            $table->date('fecha');

            $table->unsignedBigInteger('contactos_id');
            $table->foreign('contactos_id')
                ->references('id')->on('contactos')
                ->onDelete('cascade');
                
            $table->string('causa');

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
        Schema::dropIfExists('descartados');
    }
};
