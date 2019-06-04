<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModoServiciosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('modo_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->longText('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('modo_servicios');
    }
}
