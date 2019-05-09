<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\CliPaq;
use App\User;

class PagosController extends Controller
{
    public function index(Request $request)
    {
        $pagos = Pago::search($request->buscar)
                ->orderBy('fechaTrans')
                ->where('condicion', '0')
                ->paginate(10);
        return view('admin.pagos.index')->with('pagos', $pagos);
    }

    public function verificados(Request $request)
    {
        $pagos = Pago::search($request->buscar)
                ->orderBy('fechaTrans')
                ->where('condicion', '1')
                ->paginate(10);
        return view('admin.pagos.verificados')->with('pagos', $pagos);
    }

    public function rechazados(Request $request)
    {
        $pagos = Pago::search($request->buscar)
                ->orderBy('fechaTrans')
                ->where('condicion', '2')
                ->paginate(10);
        return view('admin.pagos.rechazados')->with('pagos', $pagos);
    }

    public function verificar($id)
    {
        $pago    = Pago::find($id);
        $clipaqs = CliPaq::where('evento_id', $pago->evento_id)
                        ->where('user_id',    $pago->user_id)
                        ->get();
        $pagoTotal = $pago->monto;
        foreach ($clipaqs as $clipaq) {
            if ($clipaq->pagar - $clipaq->abonado > 0) {
                $clipaqG = CliPaq::find($clipaq->id);
                $pagoE   = $clipaqG->pagar - $clipaqG->abonado;
                if ($pagoE > $pago->monto) {
                    $pagoE = $pago->monto;
                }
                $clipaqG->abonado =  $clipaqG->abonado + $pagoE;
                $clipaqG->save();
                $pago->condicion = 1;
                $pago->save();
                $pagoTotal = $pagoTotal - $pagoE;
                if ($pagoTotal == 0) {
                    break;
                }
            }
        }
        if ($pagoTotal != 0) {
            $user = User::find($pago->user_id);
            $user->saldo = $user->saldo + $pagoTotal;
            $pago->condicion = 1;
            $pago->save();            
            $user->save();
        }
        return redirect()->route('pagos.index');
    }

    public function rechazar($id)
    {
        $pago = Pago::find($id);
        $pago->condicion = 2;
        $pago->save();
        return redirect()->route('pagos.index');
    }

    public function porverificar($id)
    {
        $pago = Pago::find($id);
        $pago->condicion = 0;
        $pago->save();
        return redirect()->route('pagos.index');
    }

    public function edit($id)
    {
        $pago = Pago::find($id);
        return view('admin.pagos.edit')->with('pago', $pago);
    }

    public function update(Request $request, $id)
    {
        $pago = Pago::find($id);
        $pago->save();

        return redirect()->route('pagos.index');
    }

}
