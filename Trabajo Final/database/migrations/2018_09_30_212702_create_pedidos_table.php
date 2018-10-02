<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // Desactiva las restricciones de clave externa
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('persona_id'); // Agregado
            $table->unsignedinteger('vianda_id'); // Agregado
            $table->foreign('persona_id')->references('id')->on('personas'); // Agregado       
            $table->foreign('vianda_id')->references('id')->on('viandas'); // Agregado   
            $table->date('fecha_solicitud'); // Agregado
            $table->date('fecha_entrega'); // Agregado
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints(); // Activa las restricciones de clave externa
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
