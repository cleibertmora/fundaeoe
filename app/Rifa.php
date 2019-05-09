<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Rifa extends Model

{

    protected $table = 'rifas';

    protected $fillable = [
        'user_id',
        'nombre',
        'pais',
        'ciudad',
        'descripcion',
        'fecha_in',
        'fecha_fin',
        'clausula',
        'premio',
        'moneda',
    ];

    public function User() 
    {
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function users()
    {
    return $this->belongsToMany(User::class); 
    }

}

