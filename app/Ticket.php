<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Ticket extends Model

{

    protected $table = 'tickets_rifas';

    protected $fillable = [
        'rifa_id',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'direccion',
        'institucion',
        'tipo',
        'documento',
        'num_control',
        'comentario',
        'usuario_registra'
    ];

    public function Rifa(){
        return $this->hasOne('App\Rifa','id', 'rifa_id');
    }

}

