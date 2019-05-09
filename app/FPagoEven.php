<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FPagoEven extends Model
{
   	protected $table = 'fpagoeven';
    protected $fillable = [
        'formapago_id', 'evento_id',
    ];
}
