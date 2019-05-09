<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Pago;
use App\User;
use App\CliPaq;
use Laracasts\Flash\Flash;

use MP;

class BancoController extends Controller
{
    public function index(Request $request)
    {
        $bancos = Banco::search($request->buscar)->orderBy('id')->paginate(5);
        return view('admin.banco.index')->with('bancos', $bancos);
    }

    public function create()
    {
        return view('admin.banco.create');        
    }

    public function store(Request $request)
    {
        $banco = new Banco($request->all());
        $file = $request->file('logo');
        if (!is_null($file)) {
            $name = 'fundaeoe_banco_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/bancos/';
            $file->move($path, $name);
            $banco->logo = $name;
        }
        $file = $request->file('recibo');
        if (!is_null($file)) {
            $name = 'fundaeoe_recibo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/bancos/';
            $file->move($path, $name);
            $banco->recibo = $name;
        }
        $banco->save();
        return redirect()->route('banco.index');
    }

    public function show($id)
    {
        return redirect()->route('banco.index');
    }

    public function edit($id)
    {
        $banco = Banco::find($id);
        return view('admin.banco.edit')->with('banco', $banco);
    }

    public function update(Request $request, $id)
    {
        $banco = Banco::find($id);
        $file  = $request->file('logo');
        if (!is_null($file)) {
            $name = 'fundaeoe_banco_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/bancos/';
            $file->move($path, $name);
            $banco->logo = $name;
        }
        $file  = $request->file('recibo');
        if (!is_null($file)) {
            $name = 'fundaeoe_recibo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/bancos/';
            $file->move($path, $name);
            $banco->recibo = $name;
        }
        $banco->descripcion = $request->descripcion;
        $banco->cuentano    = $request->cuentano;
        $banco->rif         = $request->rif;
        $banco->empresa     = $request->empresa;
        $banco->pais        = $request->pais;
        $banco->save();
        return redirect()->route('banco.index');
    }

    public function destroy($id)
    {
        $banco = Banco::find($id);
        $banco->delete();
        return redirect()->route('banco.index');        
    }

    // ---------------------------------------------------------------------------------------------------------------
    // MODIFICAR PARA VERIFICAR PAGOS
    //
    public function notificarPago(Request $request)
    {
        MP::sandbox_mode(FALSE);
        if (!isset($request->id, $request->type) || !ctype_digit($request->id)) {
            http_response_code(400);
            return;
        }
        //$payment_info  = MP::search_payment($filters); 
        //dd($payment_info);

        header("HTTP/1.1 200 OK");
        return \Response::json(['HTTP/1.1 200 OK'], 200);
    }
    // ---------------------------------------------------------------------------------------------------------------

    public function pago_add(Request $request)
    {

        $mont = str_replace('.','',$request->monto);
        $mont = str_replace(',','.',$mont);

        $clipaq  = CliPaq::find($request->clipaq_id);

        if ($request->formapago_id == 6) {
            if (is_null($clipaq->Evento->afiche) || $clipaq->Evento->afiche == '') {
                $imagen = 'ND.gif';
            } else {
                $imagen = $clipaq->Evento->afiche;
            }
            $preferenceData = [
                'items' => [
                    [
                        'id'          => $clipaq->id,
                        'category_id' => 'learnings',
                        'title'       => $clipaq->Evento->titulo,
                        'description' => $clipaq->Paquete->titulo . ': ' . $clipaq->Etapa->titulo,
                        'picture_url' => 'https://www.fundaeoe.org/images/afiProx/' . $imagen,
                        'quantity'    => 1,
                        'currency_id' => 'COP',
                        'unit_price'  => (float) $mont,
                    ]
                ],
                'payer' => [
                    'name'            => $clipaq->Usuario->primerApellido,
                    'surname'         => $clipaq->Usuario->primerNombre,
                    'email'           => $clipaq->Usuario->email,
                ],
                'back_urls' => [
                    'success'         => 'https://www.fundaeoe.org/users/RespEventos',
                    'pending'         => 'https://www.fundaeoe.org/users/eventos',
                    'failure'         => 'https://www.fundaeoe.org/users/eventos',
                ],
                'auto_return'         => 'approved',
                'notification_url'    => 'https://www.fundaeoe.org/notificar/pagos',

            ];
            $preference = MP::create_preference($preferenceData);
            //return dd($preference);
        }

        $pago = new Pago($request->all());
        if ($request->formapago_id == 5) {
            $usuario = User::find($request->user_id);
            $usuario->saldo = $usuario->saldo - $mont;
            $usuario->save();
            $clipaq  = CliPaq::find($request->clipaq_id);
            $clipaq->abonado = $clipaq->abonado + $mont;
            $clipaq->save();
        }
        $pago->fechaTrans = \DateTime::createFromFormat('d/m/Y', $request->fechaTrans)->format('Y-m-d');
        $pago->monto = $mont;
        $pago->save();

        if ($request->formapago_id == 6) {
            //return redirect()->to($preference['response']['sandbox_init_point']);
            return redirect()->to($preference['response']['init_point']);
        } else {
            return redirect()->route('users.misEventos');
        }
    }
}
