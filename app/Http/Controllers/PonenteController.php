<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ponente;

class PonenteController extends Controller
{
    public function index(Request $request)
    {
        $ponentes = Ponente::search($request->buscar)->orderBy('nombre')->paginate(20);
        return view('admin.ponente.index')->with('ponentes', $ponentes);   
    }

    public function create()
    {
        return view('admin.ponente.create');        
    }

    public function store(Request $request)
    {
        $ponente   = new Ponente($request->all());
        $file_foto = $request->file('foto');
        $file_curr = $request->file('curriculo');
        if (!is_null($file_foto)) {
            $name = 'fundaeoe_foto_' . time() . '.' . $file_foto->getClientOriginalExtension();
            $path = public_path() . '/images/ponentes/';
            $file_foto->move($path, $name);
            $ponente->foto = $name;
        }
        if (!is_null($file_curr)) {
            $name = 'fundaeoe_curr_' . time() . '.' . $file_curr->getClientOriginalExtension();
            $path = public_path() . '/images/ponentes/curriculums/';
            $file_curr->move($path, $name);
            $ponente->curriculo = $name;
        }
        $ponente->save();
        return redirect()->route('ponente.index');
    }

    public function show($id)
    {
        return redirect()->route('ponente.index');
    }

    public function edit($id)
    {
        $ponente = Ponente::find($id);
        return view('admin.ponente.edit')->with('ponente', $ponente);
    }

    public function update(Request $request, $id)
    {
        $ponente = Ponente::find($id);
        $file_foto = $request->file('foto');
        $file_curr = $request->file('curriculo');
        if (!is_null($file_foto)) {
            $name = 'fundaeoe_foto_' . time() . '.' . $file_foto->getClientOriginalExtension();
            $path = public_path() . '/images/ponentes/';
            $file_foto->move($path, $name);
            $ponente->foto = $name;
        }
        if (!is_null($file_curr)) {
            $name = 'fundaeoe_curr_' . time() . '.' . $file_curr->getClientOriginalExtension();
            $path = public_path() . '/images/ponentes/curriculums/';
            $file_curr->move($path, $name);
            $ponente->curriculo = $name;
        }
        $ponente->titulo    = $request->titulo;
        $ponente->nombre    = $request->nombre;
        $ponente->apellido  = $request->apellido;
        $ponente->pais      = $request->pais;
        $ponente->save();
        return redirect()->route('ponente.index');
    }

    public function destroy($id)
    {
        $ponente = Ponente::find($id);
        $ponente->delete();
        return redirect()->route('ponente.index');    }
}
