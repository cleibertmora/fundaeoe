<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Politica;

class PoliticaController extends Controller
{
    public function index(Request $request)
    {
        $politicas = Politica::search($request->buscar)->orderBy('id')->paginate(5);
        return view('admin.politica.index')->with('politicas', $politicas);    }

    public function create()
    {
        return view('admin.politica.create');        
    }

    public function store(Request $request)
    {
        $politica = new Politica($request->all());
        $politica->save();
        return redirect()->route('politica.index');       
    }

    public function show($id)
    {
        return redirect()->route('politica.index');       
    }

    public function edit($id)
    {
        $politica = Politica::find($id);
        return view('admin.politica.edit')->with('politica', $politica);
    }

    public function update(Request $request, $id)
    {
        $politica = Politica::find($id);
        $politica->detalles = $request->detalles;
        $politica->save();
        return redirect()->route('politica.index');
    }

    public function destroy($id)
    {
        $politica = Politica::find($id);
        $politica->delete();
        return redirect()->route('politica.index');
    }
}
