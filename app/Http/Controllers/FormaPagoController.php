<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaPago;

class FormaPagoController extends Controller
{
    public function index(Request $request)
    {
        $formasPago = FormaPago::search($request->buscar)->orderBy('forma')->paginate(5);
        return view('admin.formaPago.index')->with('formasPago', $formasPago);
    }

    public function create()
    {
        return view('admin.formaPago.create');
    }

    public function store(Request $request)
    {
        $formaPago = new FormaPago($request->all());
        $formaPago->save();
        return redirect()->route('formaPago.index');
    }

    public function show($id)
    {
        return redirect()->route('formaPago.index');
    }

    public function edit($id)
    {
        $formaPago = FormaPago::find($id);
        return view('admin.formaPago.edit')->with('formaPago', $formaPago);
    }

    public function update(Request $request, $id)
    {
        $formaPago = FormaPago::find($id);
        $formaPago->forma = $request->forma;
        $formaPago->adicional = $request->adicional;
        $formaPago->tipo = $request->tipo;
        $formaPago->save();
        return redirect()->route('formaPago.index');
    }

    public function destroy($id)
    {
        $formaPago = FormaPago::find($id);
        $formaPago->delete();
        return redirect()->route('formaPago.index');    }
}
