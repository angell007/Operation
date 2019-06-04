<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class User extends Authenticatable
{
    use Notifiable, ColumnFillable;

    // public function getFullnameAttribute()
    // {
    // return $this->attributes['name'] ;
    // }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function getFullnameAttribute()
    {
    return $this->attributes['name'];
    }

}
