<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('name')->unique();
            $table->longText('descripcion');
            $table->unsignedInteger('servicio_id');
            $table->unsignedInteger('user_id');
            $table->longText('ultima')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('notas');
    }
}
