<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Producto extends Model
{
    use ColumnFillable;


    function proveedor ()
    {
        return $this-> belongsTo(Proveedor::Class);
    }

    public function partes()
    {
        return $this->hasMany('App\Parte', 'referencia', 'producto_id');
    }


}
