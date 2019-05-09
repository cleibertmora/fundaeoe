<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Instituto;
use App\Politica;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'primerNombre'      => 'required|max:255',
            'primerApellido'    => 'required|max:255',
            'email'             => 'required|email|max:255|unique:users',
            'password'          => 'required|min:6|confirmed',
        ]);
    }

    public function showRegistrationForm()
    {
        $institutos = Instituto::orderBy('descripcion')->pluck('descripcion', 'id');
        $politicas  = Politica::orderBy('id')->pluck('detalles', 'id');
        return view('auth.register', compact('id', 'institutos','politicas'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = [
            'instituto_id'      => $data['instituto_id'],
            'tipoDocumento'     => $data['tipoDocumento'],
            'documento'         => $data['documento'],
            'primerNombre'      => $data['primerNombre'],
            'segundoNombre'     => $data['segundoNombre'],
            'primerApellido'    => $data['primerApellido'],
            'segundoApellido'   => $data['segundoApellido'],
            'type'              => 'usuario',
            'sexo'              => $data['sexo'],
            'fechaNacimiento'   => \DateTime::createFromFormat('d/m/Y', $data['fechaNacimiento'])->format('Y-m-d'),
            'telefonoPrincipal' => $data['telefonoPrincipal'],
            'telefonoCelular'   => $data['telefonoCelular'],
            'pin'               => ' ',
            'email'             => $data['email'],
            'contrasena'        => $data['password'],
            'password'          => bcrypt($data['password']),
            'pais'              => $data['pais'],
            'condicion'         => '1',
            'sms'               => '1',
            'sCorreo'           => '1',
            'saldo'             => '0',
        ];

        Mail::send('emails.register', $user, function ($message) use($data) {
            $message->from('fundaeoe@gmail.com', 'www.fundaeoe.org');
            $message->to($data['email']);
            $message->cc('fundaeoe@gmail.com');
            $message->subject('REGISTRO DE USUARIO - www.fundaeoe.org');
        });
        return User::create($user);
    }
}
