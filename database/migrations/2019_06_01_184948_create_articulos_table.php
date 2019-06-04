<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('servicio_id')->nullable();
            $table->string('tipo')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie')->unique();
            $table->string('imei1')->unique()->nullable();
            $table->string('imei2')->unique()->nullable();
            $table->string('almacen_compra')->nullable();
            $table->string('numero_factura_compra')->nullable();
            $table->string('numero_vertificado_garantia')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('articulos');
    }
}
