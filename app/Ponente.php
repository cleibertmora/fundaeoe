<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
	protected $table = 'ponente';
    protected $fillable = [
        'titulo', 'nombre', 'apellido', 'curriculo', 'pais', 'foto', 
    ];

    public function scopeSearch($query, $buscar)
    {
        return $query->where('nombre', 'LIKE', "%$buscar%")->orwhere('apellido', 'LIKE', "%$buscar%");
    }

    public function getFullNameAttribute() 
    {
        return trim($this->nombre) . ' ' . trim($this->apellido);
    }
}
