<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    public function up()
    {

        // create table
        // $table->string('articulo_id')->nullable();
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id')->nullable();
            $table->unsignedInteger('razon_id')->nullable();
            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('modo_servicio_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cliente_id');
            $table->date('fecha_inicio');
            $table->date('fecha_reparado')->nullable();
            $table->date('fecha_finalizado')->nullable();
            $table->string('mano_obra')->nullable();
            $table->string('valor_asegurado_producto')->nullable();
            $table->string('happy_call_estado')->nullable();
            $table->string('happy_call_calificacion')->nullable();
            $table->string('valor_cotizado')->nullable();
            $table->string('valor_total')->nullable();
            $table->longText('reporte_tecnico')->nullable();
            $table->longText('reporte_cliente');
            $table->string('ubicacion_producto')->nullable();

            // $table->foreign('user_id')->references('identificacion')->on('users')->
            // onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('cliente_id')->references('identificacion')->on('clientes')->
            // onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('servicios');
    }
}
