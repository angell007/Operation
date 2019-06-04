<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Servicio extends Model
{
    use ColumnFillable;

    protected $defaults = array(
        'razon_id' => 1, //valor por defecto
    );

    public function __construct(array $attributes = array()) {
    $this->setRawAttributes($this->defaults, true);
    parent::__construct($attributes);

    }

     // this is a recommended way to declare event handlers
     public static function boot() {
        parent::boot();

        static::deleting(function($Servicio) { // before delete() method call this
            $Servicio->articulos()->delete();
             // do the rest of the cleanup...
        });
            static::deleting(function($Servicio) { // before delete() method call this
                $Servicio->notas()->delete();
                 // do the rest of the cleanup...
            });
    }

    function partes ()
    {
        return $this-> hasMany(Parte::Class);
    }

    function cliente()
    {
        return $this-> belongsTo(Cliente::Class,'cliente_id','identificacion' );
    }


     function user()
    {
        return $this->belongsTo(User::Class,'user_id','identificacion');
    }


    function articulos ()
    {
        return $this-> hasMany(Articulo::Class);
    }
    function notas()
    {
        return $this->hasMany(Nota::Class);
    }

    function razon ()
    {
        return $this-> belongsTo(Razon::Class);
    }

    function modoServicio()
    {
        return $this->belongsTo(ModoServicio::Class,'modo_servicio_id');
    }

    function tipo ()
    {
        return $this->belongsTo(Tipo::Class);
    }

    function LastestNota()
    {
        return $this->hasOne(Nota::class)->latest();
    }

}
