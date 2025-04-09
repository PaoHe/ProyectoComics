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
      Schema::create('admin_profiles', function (Blueprint $table) {
        $table->id();
          $table->string('empresa');
          $table->string('encargado');
          $table->string('correo');
          $table->string('telefono');
          $table->string('direccion');
          $table->string('estatus');
          $table->string('razon_social');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_profiles');
    }
};
