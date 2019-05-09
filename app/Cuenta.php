<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $fillable = [
        'user_id', 'evento_id', 'fec', 'hor', 'pagada',
    ];
    
    public function Evento() {
        return $this->hasOne('App\Evento','id', 'evento_id');
    }

}
