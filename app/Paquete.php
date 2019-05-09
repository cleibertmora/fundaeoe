<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';
    protected $fillable = [
        'evento_id', 'tipo', 'titulo', 'detalles', 'costo', 'vence', 'persona', 'aplicable', 'compatible',
    ];
    
}
