<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //Schema::create('productos', function (Blueprint $table) {
        //$table->id();
        //$table->string('nombre');
        //$table->decimal('precio', 10, 2);
        //$table->string('imagen')->nullable();
        //$table->integer('stock')->default(1);
        //$table->enum('tipo', ['comic', 'figura']);
        //$table->string('descripcion')->nullable();
        //$table->string('tamano')->nullable();
        //$table->string('material')->nullable();
        //$table->string('peso')->nullable();
        //$table->string('modelo')->nullable();
        //$table->timestamps();
        //});
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
