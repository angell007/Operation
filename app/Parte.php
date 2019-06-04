<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Parte extends Model
{
    use ColumnFillable;


    public function producto()
    {
        return $this->belongsTo('App\Producto','producto_id','referencia');
    }

}
