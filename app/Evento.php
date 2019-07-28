<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
   	protected $table = 'eventos';
    protected $fillable = [
        'titulo', 'type', 'fechaI', 'fechaF', 'capacidad', 'horasA', 'horasC', 'notas', 'direccion', 'gps1', 'gps2', 'condicion', 'costo', 'mapa', 'afiche', 'banner', 'participacion', 'monedaCambio', 'Moneda', 'inicial', 'ncuotas',
    ];

    public function Paquetes() {
        return $this->hasMany('App\Paquete')->orderBy('tipo','ASC');
    }

    public function Etapas() {
        return $this->hasMany('App\Etapa')->orderBy('fechaF','ASC');
    }

    public function Avales() {
        return $this->hasMany('App\Aval');
    }

    public function Ponentes() {
        return $this->hasMany('App\EventoPonente');
    }

    public function scopeSearch($query, $buscar)
    {
        return $query->where('titulo', 'LIKE', "%$buscar%");
    }

}
