<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Collection;
//use App\Http\Requests\CertificateStoreRequest;
//use App\Http\Requests\CertificateUpdateRequest;
use App\Certificate;
use App\User;
use App\Evento;

class CertificadosController extends Controller
{
  
    public function index(Request $request)
    {
        $cedula = trim($request->get('buscar'));
     
        if($cedula){   
            $certificates = DB::table('certificates')
                            ->join('users', 'users.id', '=', 'certificates.user_id')
                            ->join('eventos', 'eventos.id', '=', 'certificates.evento_id')
                            ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"), 'eventos.titulo', 'certificates.id', 'certificates.fecha', 'certificates.nota', 'certificates.path', 'users.documento')
                            ->orderBy('id', 'DESC')
                            ->where('users.documento', 'LIKE', '%'.$cedula.'%')
                            ->get();
            
            return view('certificates.index', ['certificates' => $certificates, 'cedula' => $cedula]);
        }else{
            //dd('$cedula');
            return view('certificates.index');
        }
        
    }

    public function show($id)

    {

    }

}

