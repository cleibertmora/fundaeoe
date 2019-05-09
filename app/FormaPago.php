<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
   	protected $table = 'formapago';
    protected $fillable = [
        'forma', 'adicional', 'tipo',
    ];

    public function scopeSearch($query, $buscar)
    {
        return $query->where('forma', 'LIKE', "%$buscar%");
    }
}
