<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituto;
use Laracasts\Flash\Flash;

class InstitutoController extends Controller
{
    public function index(Request $request)
    {
        $instituciones = Instituto::search($request->buscar)->orderBy('descripcion')->paginate(10);
        return view('admin.instituto.index')->with('instituciones', $instituciones);
    }

    public function create()
    {
        return view('admin.instituto.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('logo');
        if (!is_null($file)) {
            $name = 'fundaeoe_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/logos/';
            $file->move($path, $name);
        }
        $institucion = new Instituto($request->all());
        if (!is_null($file)) {
            $institucion->logo = $name;
        }
        $institucion->save();
        return redirect()->route('instituto.index');       
    }

    public function show($id)
    {
        return redirect()->route('instituto.index');
    }

    public function edit($id)
    {
        $institucion = Instituto::find($id);
        return view('admin.instituto.edit')->with('institucion', $institucion);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('logo');
        if (!is_null($file)) {
            $name = 'fundaeoe_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/logos/';
            $file->move($path, $name);
        }
        $institucion = Instituto::find($id);
        $institucion->descripcion = $request->descripcion;
        $institucion->web = $request->web;
        if (!is_null($file)) {
            $institucion->logo = $name;
        }
        $institucion->save();
        return redirect()->route('instituto.index');
    }

    public function destroy($id)
    {
        $institucion = Instituto::find($id);
        $institucion->delete();
        return redirect()->route('instituto.index');
    }
}
