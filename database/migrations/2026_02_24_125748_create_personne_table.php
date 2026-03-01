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
        Schema::create('personne', function (Blueprint $table) {
            $table->id('idPer');
            $table->String('nomPer');
            $table->String('prenomPer');
            $table->DATE('dateNaisPer');
            $table->String('agePer');
            $table->String('bioPer');
            $table->String('lieuNaisPer');
            $table->foreignId('idRolePer')->constrained('personne', 'idRolePer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personne');
    }
};
