<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('proveedores', function (Blueprint $table) {
        $table->timestamps(); // Esto crea 'created_at' y 'updated_at'
    });
}

public function down(): void
{
    Schema::table('proveedores', function (Blueprint $table) {
        $table->dropTimestamps();
    });
}
};
