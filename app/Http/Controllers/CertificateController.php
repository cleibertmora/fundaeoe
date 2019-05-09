<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Collection;
use App\Http\Requests\CertificateStoreRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Certificate;
use App\User;
use App\Evento;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function index(Request $request)
    {

        $getDocumento = $request->get('buscar');

        if($getDocumento){
            $cedula   = $request->get('buscar');
        }else{
            $cedula   = false;
        }

        $certificates = DB::table('certificates')
                        ->join('users', 'users.id', '=', 'certificates.user_id')
                        ->join('eventos', 'eventos.id', '=', 'certificates.evento_id')
                        ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"), 'eventos.titulo', 'certificates.id', 'certificates.fecha', 'certificates.nota', 'certificates.path', 'users.documento')
                        ->orderBy('id', 'DESC')
                        ->when($cedula, function ($query) use ($cedula) {
                            return $query->where('users.documento', 'LIKE', '%'.$cedula.'%');
                        })
                        ->paginate(10);

//       return dd($certificates);

        return view('admin.certificate.index', ['certificates' => $certificates]);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $eventos = Evento::orderBy('titulo', 'DESC')->pluck('titulo', 'id');

        

        return view('admin.certificate.create', compact('eventos'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

         $this->validate($request, [
            'iduser'      => 'required',
            'fecha'       => 'required',
            'certificado' => 'required|max:1999'
        ]);

        $certificate            =  new Certificate;
        $certificate->evento_id =  $request->evento_id;
        $certificate->user_id   =  $request->iduser;
        $certificate->fecha     =  \DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
        $certificate->nota      =  $request->nota;
        $file                   = $request->file('certificado');
            if (!is_null($file)) {
                $name = 'fundaeoe_certificado' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path() . '/certificados/';
                $file->move($path, $name);
                $certificate->path = $name;
            }

        $certificate->save();

        return redirect()->route('certificado.index')
                         ->with('success', 'Certificado insertado correctamente');
    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        
        $certificates = DB::table('certificates')
                        ->join('users', 'users.id', '=', 'certificates.user_id')
                        ->join('eventos', 'eventos.id', '=', 'certificates.evento_id')
                        ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"), 'eventos.titulo', 'certificates.id', 'certificates.fecha', 'users.id as user_id', 'certificates.path', 'users.documento')
                        ->orderBy('id', 'DESC')
                        ->where('certificates.user_id', '=', $id)
                        ->get();
        
        //return dd($certificates);
        
        return view('certificates.show', ['certificates' => $certificates]);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $eventos     = Evento::orderBy('titulo', 'DESC')->pluck('titulo', 'id');
        $certificate  = DB::table('certificates')
                        ->join('users', 'users.id', '=', 'certificates.user_id')
                        ->join('eventos', 'eventos.id', '=', 'certificates.evento_id')
                        ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS usuario"), 'users.documento AS cedula', 'users.id AS iduser', 'eventos.id as evento_id', 'certificates.id', 'certificates.fecha', 'certificates.nota', 'certificates.path')
                        ->where('certificates.id', '=', $id)
                        ->orderBy('certificates.created_at', 'DESC')
                        ->first(); 
        return view('admin.certificate.edit', compact('certificate', 'eventos'));
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
        
        $this->validate($request, [
            'iduser'      => 'required',
            'fecha'       => 'required',
            'certificado' => 'required|max:1999'
        ]);
        

        $certificate            =  Certificate::find($id);
        $certificate->evento_id =  $request->evento_id;
        $certificate->user_id   =  $request->iduser;
        $certificate->fecha     =  \DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
        $certificate->nota      =  $request->nota;
        $file                   =  $request->file('certificado');
            if (!is_null($file)) {
                $name = 'fundaeoe_certificado' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path() . '/certificados/';
                $file->move($path, $name);
                $certificate->path = $name;
            }
        
        $certificate->save();

        return redirect()->route('certificado.index')->with('success', 'Certificado actualizado con éxito');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        $certificate = Certificate::find($id);
        $certificate->delete();
        return redirect()->route('certificado.index')->with('success', 'Certificado eliminado con éxito');   
    }



    public function cedula(Request $request)

    {

        $cedula = $request->documento;    

        $user   =  User::documento($cedula)->get();



        return response()->json($user);

    }



}

