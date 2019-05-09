<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aval extends Model
{
    protected $table = 'avales';
    protected $fillable = [
        'evento_id', 'instituto_id',
    ];

    public function Instituto() {
        return $this->hasOne('App\Instituto', 'id', 'instituto_id');
    }
}
