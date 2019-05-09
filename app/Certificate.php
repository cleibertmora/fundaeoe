<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $fillable = [
        'user_id', 
        'evento_id',
        'fecha',
        'nota',
        'path',
    ];

    public function Evento() {
        return $this->hasOne('App\Evento','id', 'evento_id');
    }

    public function Paquete() {
        return $this->hasOne('App\User','id', 'user_id');
    }
}
