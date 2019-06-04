<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('factura_id');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio', 10 , 2 );
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('detalles');
    }
}
