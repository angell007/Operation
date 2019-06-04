<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('nit')->unique();
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('telefono_opcional')->nullable();
            $table->longText('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('proveedors');
    }
}
