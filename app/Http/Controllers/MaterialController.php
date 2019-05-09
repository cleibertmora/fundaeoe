<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $materiales = Material::search($request->buscar)->orderBy('descripcion')->paginate(5);
        return view('admin.material.index')->with('materiales', $materiales);
    }

    public function create()
    {
        return view('admin.material.create');        
    }

    public function store(Request $request)
    {
        $file = $request->file('logo');
        if (!is_null($file)) {
            $name = 'fundaeoe_material_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/logos/';
            $file->move($path, $name);
        }
        $material = new Material($request->all());
        if (!is_null($file)) {
            $material->logo = $name;
        }
        $material->save();
        return redirect()->route('material.index');       
    }

    public function show($id)
    {
        return redirect()->route('material.index');        
    }

    public function edit($id)
    {
        $material = Material::find($id);
        return view('admin.material.edit')->with('material', $material);
    }

    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $file = $request->file('logo');
        if (!is_null($file)) {
            $name = 'fundaeoe_material_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/logos/';
            $file->move($path, $name);
        }
        $material->descripcion = $request->descripcion;
        if (!is_null($file)) {
            $material->logo = $name;
        }
        $material->save();
        return redirect()->route('material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();
        //Flash::warning('La institución ' . $institucion->descripcion . ' ha sido borrada con éxito');
        return redirect()->route('material.index');        
    }
}
