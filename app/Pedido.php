<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Pedido extends Model
{
    use ColumnFillable;
    
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }
}
