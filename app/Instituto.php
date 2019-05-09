<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
   	protected $table = 'instituto';
    protected $fillable = [
        'descripcion', 'web', 'logo',
    ];

    public function scopeSearch($query, $buscar)
    {
        return $query->where('descripcion', 'LIKE', "%$buscar%");
    }
}
