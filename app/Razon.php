<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Razon extends Model
{
    use ColumnFillable;
    
    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
