<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use MP;

use Illuminate\Http\Request;
use App\Evento;
use App\Etapa;
use App\Paquete;
use App\CliPaq;
use App\FormaPago;
use App\Banco;
use App\Politica;
use App\Cuenta;
use App\Pago;
use App\Exchange;
use App\User;

class EventosController extends Controller
{
    public function index()
    {
        return view('eventos.index');
    }

    public function congresos()
    {
        $eventosA = Evento::orderBy('fechaI','DESC')
            ->where('type', 'congreso')
            ->where('fechaF', '>=',  date("Y-m-d"))
            ->paginate(500);
        $eventosF = Evento::orderBy('fechaI','DESC')
            ->where('type', 'congreso')
            ->where('fechaF', '<',  date("Y-m-d"))
            ->paginate(500);
        return view('eventos.congresos')->with('eventosA', $eventosA)->with('eventosF', $eventosF);
    }

    public function jornadas()
    {
        $eventosA = Evento::orderBy('fechaI','DESC')
            ->where('type', 'jornada')
            ->where('fechaF', '>=',  date("Y-m-d"))
            ->paginate(500);
        $eventosF = Evento::orderBy('fechaI','DESC')
            ->where('type', 'jornada')
            ->where('fechaF', '<',  date("Y-m-d"))
            ->paginate(500);
        return view('eventos.jornadas')->with('eventosA', $eventosA)->with('eventosF', $eventosF);
    }

    public function cursos()
    {
        $eventosA = Evento::orderBy('fechaI','DESC')
            ->where('type', 'curso')
            ->where('fechaF', '>=',  date("Y-m-d"))
            ->paginate(500);
        $eventosF = Evento::orderBy('fechaI','DESC')
            ->where('type', 'curso')
            ->where('fechaF', '<',  date("Y-m-d"))
            ->paginate(500);
        //return dd($eventosA);
        return view('eventos.cursos')->with('eventosA', $eventosA)->with('eventosF', $eventosF);
    }

    public function capacitaciones()
    {
        $eventosA = Evento::orderBy('fechaI','DESC')
            ->where('type', 'capacitación')
            ->where('fechaF', '>=',  date("Y-m-d"))
            ->paginate(500);
        $eventosF = Evento::orderBy('fechaI','DESC')
            ->where('type', 'capacitación')
            ->where('fechaF', '<',  date("Y-m-d"))
            ->paginate(500);
        return view('eventos.capacitaciones')->with('eventosA', $eventosA)->with('eventosF', $eventosF);
    }

    public function emprendimientos()
    {
        $eventosA = Evento::orderBy('fechaI','DESC')
            ->where('type', 'emprendimiento')
            ->where('fechaF', '>=',  date("Y-m-d"))
            ->paginate(500);
        $eventosF = Evento::orderBy('fechaI','DESC')
            ->where('type', 'emprendimiento')
            ->where('fechaF', '<',  date("Y-m-d"))
            ->paginate(500);
        return view('eventos.emprendimientos')->with('eventosA', $eventosA)->with('eventosF', $eventosF);
    }

    public function diplomados()
    {
        $eventosA = Evento::orderBy('fechaI','DESC')
            ->where('type', 'diplomado')
            ->where('fechaF', '>=',  date("Y-m-d"))
            ->paginate(500);
        $eventosF = Evento::orderBy('fechaI','DESC')
            ->where('type', 'diplomado')
            ->where('fechaF', '<',  date("Y-m-d"))
            ->paginate(500);
        return view('eventos.diplomados')->with('eventosA', $eventosA)->with('eventosF', $eventosF);
    }

    public function show($id)
    {
        $evento = Evento::find($id);
        $bancos = Banco::all();
        $dollar = 1;
        $tasaCambio = $this->getExchangeRate();


        dd($tasaCambio);

        return view('eventos.evento')
            ->with('evento',$evento)
            ->with('bancos',$bancos)
            ->with('dollar',$dollar)
            ->with('tasaCambio',$tasaCambio);
    }

    public function misEventos()
    {
        $user = auth()->user();
        
        if($user->type == "admin"){
            $pagos    = Pago::orderBy('id','DESC')->where('user_id', '=', Auth::user()->id)->get();
            $clipaqs  = CliPaq::where('user_id', '=', Auth::user()->id)->get();
            $eventosI = Cuenta::where('user_id', '=', Auth::user()->id)->get();
            $eventos  = Evento::orderBy('fechaI','DESC')
                        ->where('fechaF', '>=',  date("Y-m-d"))
                        ->paginate(500);
                        //->get();
        }else{
            $pagos    = Pago::orderBy('id','DESC')->where('user_id', '=', Auth::user()->id)->get();
            $clipaqs  = CliPaq::where('user_id', '=', Auth::user()->id)->get();
            $eventosI = Cuenta::where('user_id', '=', Auth::user()->id)->get();
            $eventos  = Evento::orderBy('fechaI','DESC')
                ->where('fechaF', '>=',  date("Y-m-d"))
                ->paginate(500);
        }

        //return dd($eventos);

        return view('users.eventos')
            ->with('pagos', $pagos)
            ->with('clipaqs', $clipaqs)
            ->with('eventos', $eventos)
            ->with('eventosI', $eventosI);
        }

    public function RespEventos(Request $request)
    {
        MP::sandbox_mode(FALSE);
        $payment_info  = MP::get_preference($request->preference_id);

        if ($payment_info['status'] == 200 and $request->collection_status == 'approved') {
            if ($payment_info['response']['auto_return'] == 'approved') {
                $clipaqID  = $payment_info['response']['items'][0]['id'];
                $pagoTotal = $payment_info['response']['items'][0]['unit_price'];
                $clipaq    = CliPaq::find($clipaqID);
                $pagos     = Pago::where('user_id',      $clipaq->user_id)
                                 ->where('evento_id',    $clipaq->evento_id)
                                 ->where('formapago_id', 6)
                                 ->where('paquete_id',   $clipaq->paquete_id)
                                 ->get();
                foreach ($pagos as $pago) {
                    $pago->condicion = 1;
                    $pago->save();
                    if ($clipaq->pagar - $clipaq->abonado > 0) {
                        $pagoE   = $clipaq->pagar - $clipaq->abonado;
                        if ($pagoE > $pago->monto) {
                           $pagoE = $pago->monto;
                        }
                        $clipaq->abonado = $clipaq->abonado + $pagoE;
                        $clipaq->save();
                        $pagoTotal = $pagoTotal - $pagoE;
                        if ($pagoTotal != 0) {
                            $user = User::find($pago->user_id);
                            $user->saldo = $user->saldo + $pagoTotal;
                            $user->save();
                        }
                    }
                }
            }
        }
        //  ?collection_id=3949376&collection_status=approved&preference_id=260027231-e6e24244-88f8-4d7b-9166-e5fa692b6ab6&external_reference=null&payment_type=credit_card&merchant_order_id=null
        return redirect()->route('users.misEventos');
    }

    public function inscribir($id)
    {
        $etapa   = Etapa::find($id);
        $cuentas = Cuenta::where('user_id', '=', Auth::user()->id)
            ->where('evento_id', '=', $etapa->Evento->id)
            ->get();
        $clipaqs = CliPaq::where('user_id', '=', Auth::user()->id)
            ->where('evento_id', '=', $etapa->Evento->id)
            ->where('etapa_id','=',$id)
            ->get();
        $politicas = Politica::orderBy('id')->get();
        return view('eventos.inscribir')
            ->with('politicas', $politicas)
            ->with('cuentas', $cuentas)
            ->with('clipaqs', $clipaqs)
            ->with('etapa', $etapa);
    }

    public function inscribirS(Request $request)
    {
        $fecha      = date('Y-m-d');
        $savecuenta = 0;
        $etapa      = Etapa::find($request->etapa_id);

        if (count(Cuenta::where('user_id', '=', Auth::user()->id)
            ->where('evento_id', '=', $etapa->Evento->id)
            ->get() ) == 0) 
        {
            $cuenta = new Cuenta();
            $cuenta->user_id    = $request->user_id;
            $cuenta->evento_id  = $etapa->Evento->id;
            $cuenta->fec        = $fecha;
            $cuenta->hor        = date("H:i:s");
            $cuenta->pagada     = 0;
            $savecuenta         = 1;
        }

        if ($etapa->financiamiento == 'punico') { 
           $clipaq = new CliPaq();
           $clipaq->evento_id  = $etapa->Evento->id;
           $clipaq->paquete_id = $etapa->Paquete->id;
           $clipaq->user_id    = $request->user_id;
           $clipaq->etapa_id   = $request->etapa_id;
           $clipaq->fec        = $fecha;
           $clipaq->costo      = $etapa->costo * (1 - $etapa->descuento / 100);
           $clipaq->pagar      = $etapa->costo * (1 - $etapa->descuento / 100);
           $clipaq->abonado    = 0;
           $clipaq->save();
        } else {
           for ($i=0;$i<$etapa->Evento->ncuotas;$i++) {
              $clipaq = new CliPaq();
              $clipaq->evento_id  = $etapa->Evento->id;
              $clipaq->paquete_id = $etapa->Paquete->id;
              $clipaq->user_id    = $request->user_id;
              $clipaq->etapa_id   = $request->etapa_id;
              $clipaq->fec        = $fecha;
              $clipaq->costo      = $etapa->costo * (1 - $etapa->descuento / 100) * (1 - $etapa->Evento->inicial / 100) / $etapa->Evento->ncuotas;
              $clipaq->pagar      = $etapa->costo * (1 - $etapa->descuento / 100) * (1 - $etapa->Evento->inicial / 100) / $etapa->Evento->ncuotas;
              $clipaq->abonado    = 0;
              $clipaq->save();
           }
           $clipaq = new CliPaq();
           $clipaq->evento_id  = $etapa->Evento->id;
           $clipaq->paquete_id = $etapa->Paquete->id;
           $clipaq->user_id    = $request->user_id;
           $clipaq->etapa_id   = $request->etapa_id;
           $clipaq->fec        = $fecha;
           $clipaq->costo      = $etapa->costo * (1 - $etapa->descuento / 100) * $etapa->Evento->inicial / 100;
           $clipaq->pagar      = $etapa->costo * (1 - $etapa->descuento / 100) * $etapa->Evento->inicial / 100;
           $clipaq->abonado    = 0;
           $clipaq->save();
        }

        if ($savecuenta) $cuenta->save();

        $infocorreo        = [
            'primerNombre'   => Auth::user()->primerNombre, 
            'primerApellido' => Auth::user()->primerApellido,
            'evento'         => $etapa->Evento->titulo,
            'fecha'          => $etapa->Evento->fechaI,
            'paquete'        => $etapa->Paquete->titulo, 
            'etapaTitulo'    => $etapa->titulo,
            'costo'          => $clipaq->costo,
            'id'             => $clipaq->id
        ];

        Mail::send('emails.inscribir', $infocorreo, function ($message) {
            $message->from('fundaeoe@gmail.com', 'www.fundaeoe.org');
            #$message->to('nvicuna@gmail.com');
            $message->to(Auth::user()->email);
            $message->cc('fundaeoe@gmail.com');
            $message->subject('INSCRIPCION A EVENTO - www.fundaeoe.org');
        });

        return redirect()->route('users.misEventos');
    }

    public function eliminarEv($id)
    {
        $evento   = Evento::find($id);
        $clipaqs = CliPaq::where('user_id', '=', Auth::user()->id)
            ->where('evento_id', '=', $evento->id)
            ->get();
        foreach ($clipaqs as $clipaq) {
            if ($clipaq->abonado > 0){
                $usuario = User::find($clipaq->user_id);
                $usuario->saldo = $usuario->saldo + $clipaq->abonado;
                $usuario->save();            
            }
            $clipaq->delete();
        }
        $cuentas = Cuenta::where('user_id', '=', Auth::user()->id)
            ->where('evento_id', '=', $evento->id)
            ->get();        
        foreach ($cuentas as $cuenta) {
            $cuenta->delete();
        }
        return redirect()->route('users.misEventos');
    }

    public function eliminarEt($id)
    {
        $clipaq = CliPaq::find($id);
        if ($clipaq->abonado > 0){
            $usuario = User::find($clipaq->user_id);
            $usuario->saldo = $usuario->saldo + $clipaq->abonado;
            $usuario->save();            
        }
        $clipaq->delete();        
        return redirect()->route('users.misEventos');
    }

    public function pagarEt($id)
    {
        $clipaq  = CliPaq::find($id);
        $etapa   = Etapa::find($clipaq->etapa_id);
        $fPago   = FormaPago::orderBy('tipo')->get()->pluck('forma', 'id');;
        $cuentas = Cuenta::where('user_id', '=', Auth::user()->id)
            ->where('evento_id', '=', $etapa->Evento->id)
            ->get();
        $bancos  = Banco::orderBy('descripcion')->get()->pluck('BancoCta', 'id');
        $bancosI = Banco::orderBy('descripcion')->get();
        return view('eventos.pagar')
            ->with('cuentas', $cuentas)
            ->with('clipaq', $clipaq)
            ->with('etapa', $etapa)
            ->with('fPago', $fPago)
            ->with('bancos', $bancos)
            ->with('bancosI', $bancosI);
    }

    public function getExchangeRate()
    {
        $exchange = Exchange::orderBy('id')->first();

        $tasa     = $exchange->amount; 

//        dd($tasa);

        return $tasa;
    }

}
