<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
	protected $table = 'politicas';
    protected $fillable = [
        'detalles',
    ];

    public function scopeSearch($query, $buscar)
    {
        return $query->where('detalles', 'LIKE', "%$buscar%");
    }

}
