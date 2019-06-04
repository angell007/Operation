<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Nota extends Model
{
    use ColumnFillable;

    function user()
    {
        return $this-> belongsTo(User::Class);
    }
    function servicio()
    {
        return $this-> belongsTo(Servicio::Class);
    }

    public function getUltimaAttribute()
    {
        return substr( $this->attributes['descripcion'], 0 , 200 ) ;
    }
}
