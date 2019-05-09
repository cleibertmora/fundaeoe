<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Illuminate\Http\Request;
use App\Instituto;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::search($request->buscar)->orderBy('documento')->paginate(25);
        return view('admin.users.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutos = Instituto::orderBy('descripcion')->pluck('descripcion', 'id');
        return view('admin.users.create', compact('id', 'institutos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($user->contrasena);
        $user->fechaNacimiento =  \DateTime::createFromFormat('d/m/Y', $user->fechaNacimiento)->format('Y-m-d');
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institutos = Instituto::orderBy('descripcion')->pluck('descripcion', 'id');
        $user = User::find($id);
        if (Auth::user()->admin()) {
            return view('admin.users.edit', compact('id', 'institutos'))->with('user', $user);
        } else {
            if (Auth::user()->id == $id) {
                return view('users.edit', compact('id', 'institutos'))->with('user', $user);
            } else {
                abort(401);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->instituto_id = $request->instituto_id;
        $user->tipoDocumento = $request->tipoDocumento;
        $user->documento = $request->documento;
        $user->primerNombre = $request->primerNombre;
        $user->segundoNombre = $request->segundoNombre;
        $user->primerApellido = $request->primerApellido;
        $user->segundoApellido = $request->segundoApellido;
        $user->sexo = $request->sexo;
        $user->fechaNacimiento =  \DateTime::createFromFormat('d/m/Y', $request->fechaNacimiento)->format('Y-m-d');
        $user->telefonoPrincipal = $request->telefonoPrincipal;
        $user->telefonoCelular = $request->telefonoCelular;
        $user->email = $request->email;
        $user->pin = $request->pin;
        $user->pais = $request->pais;
        $user->type = $request->type;
        if (Auth::user()->admin() == true) {
            $user->condicion = $request->condicion;
            $user->sms = $request->sms;
            $user->sCorreo = $request->sCorreo;
            $user->saldo = $request->saldo;
            $user->contrasena = $request->contrasena;        
            $user->password = bcrypt($request->contrasena);
        }
        $user->save();
        if (Auth::user()->admin()) {
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.editU',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public function contacto(Request $request)
    {
        $contacto = [
            'email'      => $request['email'],
            'name'       => $request['name'],
            'subject'    => $request['subject'],
            'mensaje'    => $request['mensaje'],
        ];

        Mail::send('emails.contacto', $contacto, function ($message) use($contacto) {
            $message->from($contacto['email'], $contacto['name']);
            $message->to('fundaeoe@gmail.com');
            //$message->to('administracion@fundaeoe.org');
            //$message->cc('cleibert95@gmail.com');
            $message->subject($contacto['subject']);
        });
        return redirect()->route('home');
    }
}
