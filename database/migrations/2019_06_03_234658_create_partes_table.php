<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartesTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('partes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('producto_id');
            $table->unsignedInteger('servicio_id');
            $table->string('cantidad');
            $table->string('costo');
            $table->string('costo_total')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('partes');
    }
}
