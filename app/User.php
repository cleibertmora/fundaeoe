<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Scope;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;



class User extends Authenticatable

{

    use Notifiable;



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'instituto_id', 'tipoDocumento', 'documento', 'primerNombre', 'segundoNombre', 'primerApellido', 

        'segundoApellido','sexo', 'fechaNacimiento', 'telefonoPrincipal', 'telefonoCelular', 'email', 'pin', 

        'contrasena', 'password', 'condicion', 'sms', 'sCorreo', 'saldo', 'type', 'pais',

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token',

    ];



    public function getFullNameAttribute() 

    {

        return trim($this->primerNombre)   . ' ' . trim($this->segundoNombre) . ' ' . 

               trim($this->primerApellido) . ' ' . trim($this->segundoApellido);

    }



    public function scopeSearch($query, $buscar)

    {

        return $query->where('primerNombre', 'LIKE', "%$buscar%")

                ->orwhere('segundoNombre', 'LIKE', "%$buscar%")

                ->orwhere('primerApellido', 'LIKE', "%$buscar%")

                ->orwhere('segundoApellido', 'LIKE', "%$buscar%");

    }





    public function admin()

    {

        return $this->type === 'admin';

    }



    public function scopeDocumento($query, $cedula)

    {

        if($cedula)

            return $query->where('documento', '=', "$cedula");

    }

    public function rifas()
    {
        return $this->belongsToMany(Rifa::class); 
    }

}

