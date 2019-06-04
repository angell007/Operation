<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Articulo extends Model
{
    use ColumnFillable;

    // protected $fillable = [
    //     'cliente_id',
    //     'servicio_id',
    //     'serie_automatica',
    //     'marca',
    //     'modelo',
    //     'serie',
    //     'imei1',
    //     'ime2',
    //     'almacen_compra',
    //     'numero_factura_compra',
    //     'numero_vertificado_garantia',
    // ];

   function cliente ()
   {
       return $this-> belongsTo(Proveedor::Class);
   }

   function servicio ()
   {
       return $this-> belongsTo(Servicio::Class);
   }

    // public function scopeType($query, $tipo){
    // return $query->where('tipo','like','%'.$tipo.'%');
    // }

    // public function scopeMarca($query, $marca){
    // return $query->where('marca','like','%'.$marca.'%');
    // }

    // public function scopeModelo($query, $modelo){
    // return $query->where('modelo','like','%'.$modelo.'%');

    // }
}

