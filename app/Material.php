<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
   	protected $table = 'material';
    protected $fillable = [
        'descripcion', 'logo',
    ];
    public function scopeSearch($query, $buscar)
    {
        return $query->where('descripcion', 'LIKE', "%$buscar%");
    }

}
