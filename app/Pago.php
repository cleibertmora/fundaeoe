<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
 	protected $table = 'pagos';
    protected $fillable = [
        'user_id', 'evento_id', 'formapago_id', 'banco_id', 'paquete_id', 'documento', 'cheque', 'cedula', 'cuenta', 'condicion', 'monto', 'obs', 'fechaTrans', 'fechaRegi', 'hora', 
    ];

    public function Evento() {
        return $this->hasOne('App\Evento','id', 'evento_id');
    }

    public function Paquete() {
        return $this->hasOne('App\Paquete','id', 'paquete_id');
    }

    public function Usuario() {
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function FPago() {
        return $this->hasOne('App\FormaPago','id', 'formapago_id');
    }

    public function scopeSearch($query, $buscar)
    {
        return $query->where('documento', 'LIKE', "%$buscar%");
    }

}
