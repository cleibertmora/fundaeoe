<?php

namespace App;

use Illuminate\Database\Eloquent\Scope;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $table = 'exchange';
    protected $fillable = [
        'amount', 
    ];
}
