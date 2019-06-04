<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class ModoServicio extends Model
{
    use ColumnFillable;

    function servicios()
    {
        return $this-> hasMany(Servicio::Class);
    }

}
