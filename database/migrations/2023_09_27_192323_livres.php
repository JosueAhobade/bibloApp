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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('auteur');
            $table->date('date_pub');
            $table->string('maison_edition');
            $table->string('langue');
            $table->string('livre_image');
            $table->string('description');
            $table->unsignedBigInteger('idEtu')->nullable(); 
            $table->foreign('idEtu')->references('id')->on('users'); 
            $table->boolean('disponible')->nullable(); 
            $table->string('dateEmprunt')->nullable();
            $table->string('dateRemise')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
