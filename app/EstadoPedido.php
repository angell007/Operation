<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class EstadoPedido extends Model
{
    use ColumnFillable;

    function servicio ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
