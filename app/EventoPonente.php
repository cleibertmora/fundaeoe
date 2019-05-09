<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoPonente extends Model
{
   	protected $table = 'eventoponente';
    protected $fillable = [
        'evento_id', 'ponente_id', 'tema', 'fecha', 'hora'
    ];

    public function Ponente() {
        return $this->hasOne('App\Ponente', 'id', 'ponente_id');
    }
}
