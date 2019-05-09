<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CliPaq extends Model
{
    protected $table = 'clipaq';
    protected $fillable = [
        'evento_id', 'paquete_id', 'user_id', 'etapa_id', 'fec', 'costo', 'pagar', 'abonado',
    ];

    public function Evento() {
        return $this->hasOne('App\Evento','id', 'evento_id');
    }

    public function Usuario() {
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function Paquete() {
        return $this->hasOne('App\Paquete','id', 'paquete_id');
    }

    public function Etapa() {
        return $this->hasOne('App\Etapa','id', 'etapa_id');
    }

}
