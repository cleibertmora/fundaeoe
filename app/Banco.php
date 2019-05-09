<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'bancos';
    protected $fillable = [
        'descripcion', 'logo', 'cuentano', 'recibo', 'rif', 'empresa', 'pais',
    ];

    public function getBancoCtaAttribute() 
    {
        return trim($this->descripcion)   . ' - ' . trim($this->cuentano);
    }

    public function scopeSearch($query, $buscar)
    {
        return $query->where('descripcion', 'LIKE', "%$buscar%");
    }
}
