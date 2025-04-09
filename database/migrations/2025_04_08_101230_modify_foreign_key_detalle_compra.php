<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('detalle_compra', function (Blueprint $table) {
            // Elimina la foreign key existente correctamente por nombre
            $table->dropForeign('detalle_compra_ibfk_2');
    
            // Y si quieres agregarla de nuevo con 'onDelete cascade', hazlo así:
            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('detalle_compra', function (Blueprint $table) {
            $table->dropForeign(['id_producto']); // elimina la nueva FK
            // Reagrega la original sin cascada si es necesario
            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos');
        });
    }

};
