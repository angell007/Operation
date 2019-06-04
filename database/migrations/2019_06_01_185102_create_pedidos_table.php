<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('estado_pedido_id');
            $table->string('numero_pedido_interno');
            $table->string('numero_pedido_proveedor');
            $table->longText('descripcion')->nullable();
            $table->string('costo')->nullable();
            $table->string('cantidad')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('pedidos');
    }
}
