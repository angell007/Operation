<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedInteger('factura_id');
            $table->unsignedInteger('servicio_id');
            $table->unsignedInteger('proveedor_id');
            $table->string('referencia')->unique();
            $table->text('costo_sin_iva');
            $table->text('cantidad');
            $table->text('iva');
            $table->text('costo_con_iva');
            // $table->string('costo_total')->nullable();
            $table->longText('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('productos');
    }
}
