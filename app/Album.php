<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = array('name','description','cover_image','');

    public function Photos() {
        return $this->hasMany('App\Image');
    }

    public function PPhotos() {
        return $this->hasMany('App\Image')->where('publicar', '=', 1);
    }

}
