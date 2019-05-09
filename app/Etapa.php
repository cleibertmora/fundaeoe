<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
   	protected $table = 'etapa';
    protected $fillable = [
        'tipo', 'evento_id', 'paquete_id', 'titulo','financiamiento', 'descuento', 'costo', 'fechaI', 'fechaF',
    ];

    public function Evento() {
        return $this->hasOne('App\Evento','id', 'evento_id');
    }

    public function Paquete() {
        return $this->hasOne('App\Paquete','id', 'paquete_id');
    }

}
