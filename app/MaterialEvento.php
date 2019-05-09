<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialEvento extends Model
{
	protected $table = 'materialevento';
    protected $fillable = [
        'material_id', 'evento_id',
    ];
}
