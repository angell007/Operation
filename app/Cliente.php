<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Cliente extends Model
{
    use ColumnFillable;

    public function getFullnameAttribute()
    {
    return $this->attributes['name'] . ' ' . $this->attributes['apellido'] ;
    }

    function servicios()
    {
        return $this-> hasMAny(Servicio::Class,'cliente_id','identificacion');
    }

    function facturas ()
    {
        return $this-> hasMany(Factura::Class);
    }
}

