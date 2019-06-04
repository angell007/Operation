<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido');
            $table->string('sexo');
            $table->string('email');
            $table->unsignedInteger('identificacion')->unique();
            $table->string('tipo_identificacion');
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('direccion');
            $table->string('tipo_casa')->nullable();
            $table->string('barrio');
            $table->string('telefono');
            $table->string('opcional_telefono')->nullable();
            $table->string('fullname')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('clientes');
    }
}
