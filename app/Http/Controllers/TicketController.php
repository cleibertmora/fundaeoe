<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Rifa;
use App\Ticket;
use PDF;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->get('id');

        $user = auth()->user();

        if($user->type == "admin"){
            $rifas = Rifa::orderBy('id', 'DESC')
                           ->where('status', '=', 'activo')
                           ->get();
        }else{

            /*$rifas = DB::raw('SELECT r.* FROM rifas r

            INNER JOIN rifa_user ru ON r.id = ru.rifa_id
            INNER JOIN users u ON u.id = ru.user_id
            
            WHERE ru.user_id ='. $user_id);
            */
            $rifas = DB::table('rifas')
                        ->join('rifa_user', 'rifas.id', '=', 'rifa_user.rifa_id')
                        ->get();

           /*
            $rifas = DB::table('rifas')
            ->select('rifas.nombre', 'rifas.pais', 'rifas.ciudad', 'rifas.valor_ticket')
            ->join('rifa_user', 'rifas.id', '=', 'rifa_user.id')
            ->where('rifa_user.user_id', '=', $user_id)
            ->where('rifas.status', '=', 'activo')
            ->get();
            */
        }

        //dd($rifas);
        
        /*
        DB::raw("SELECT * FROM rifas r
        INNER JOIN rifa_user ru ON r.id=ru.rifa_id
        WHERE ru.user_id = 7 AND r.status = 'activo'
        ");
        */
        
        //return dd($rifas);

        return view('tickets.index', compact('rifas'));
    }

    public function list(Request $request)
    {
        $rifa_id = $request->get('rifa');
        $buscar  = $request->get('buscar');

        //$user = auth()->user();

        if($buscar){
            $consulta = $request->get('buscar');
        }else{
            $consulta = $request->get('buscar');
        }

        /*if($user->type == 'admin'){
            $tickets = DB::table('tickets_rifas')
                   ->select('tickets_rifas.*', 'users.primerNombre', 'users.primerApellido')
                   ->join('users', 'users.id', '=', 'tickets_rifas.usuario_registra')
                   ->where('tickets_rifas.rifa_id', '=', $rifa_id)
                   ->when($consulta, function ($query) use ($consulta) {
                    return $query->where('tickets_rifas.documento', 'LIKE', '%'.$consulta.'%')
                                 ->orWhere('tickets_rifas.num_control', 'LIKE', '%'.$consulta.'%');
                    })
                   ->orderBy('tickets_rifas.id', 'DESC')
                   ->get();

            $rifa    = Rifa::orderBy('id', 'DESC')
                    ->where('id', '=', $rifa_id)
                    ->first();
        }else{*/
            $tickets = DB::table('tickets_rifas')
                   ->select('tickets_rifas.*', 'users.primerNombre', 'users.primerApellido')
                   ->join('users', 'users.id', '=', 'tickets_rifas.usuario_registra')
                   ->where('tickets_rifas.rifa_id', '=', $rifa_id)
                   ->when($consulta, function ($query) use ($consulta) {
                    return $query->where('tickets_rifas.documento', 'LIKE', '%'.$consulta.'%')
                                 ->orWhere('tickets_rifas.num_control', 'LIKE', '%'.$consulta.'%');
                    })
                   ->orderBy('tickets_rifas.id', 'DESC')
                   ->get();

            $rifa    = Rifa::orderBy('id', 'DESC')
                    ->where('id', '=', $rifa_id)
                    ->first();
        //}   

        //dd($rifa);

        return view('tickets.tickets-list', compact('tickets'))->with('rifa', $rifa);
    }

    public function create(Request $request)
    {
        $rifa_id = $request->get('rifa');
        
        return view('tickets.create', compact('rifa_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'     => 'required',
            'rifa_id'     => 'required',
            'nombre'      => 'required',
            'apellido'    => 'required',
            'telefono'    => 'required',
            'correo'      => 'required',
            'direccion'   => 'required',
            'tipo'        => 'required',
            'documento'   => 'required'
        ]);
        
        $rifa     = $request->rifa_id;
        $documento = $request->documento;
        $dateY    = date("Y");
        $datem    = date("m");
        $personal = substr($documento, -4);
        $random   = rand(10,1000);

        $num_control = $rifa . '-' . $datem . $random . '-' . $personal . '-' . $dateY;

        $ticket = new Ticket;
        
        $ticket->rifa_id     = $rifa;
        $ticket->usuario_registra = $request->user_id;
        $ticket->nombre      = $request->nombre;
        $ticket->apellido    = $request->apellido;
        $ticket->telefono    = $request->telefono;
        $ticket->correo      = $request->correo;
        $ticket->direccion   = $request->direccion;
        $ticket->tipo        = $request->tipo; 
        $ticket->documento   = $documento;
        $ticket->institucion = $request->institucion; 
        $ticket->comentario  = $request->comentario;
        $ticket->num_control = $num_control;

        $ticket->save();

        return redirect()->route('tickets.list', 'rifa=' . $rifa)->with(compact('rifa'));

        //return dd($rifa_id);

    }

    public function edit($id)
    {
        //$rifa_id = $request->get('rifa');

        $ticket  = Ticket::find($id);

        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id){
        
        $this->validate($request, [
            'nombre'      => 'required',
            'apellido'    => 'required',
            'telefono'    => 'required',
            'correo'      => 'required',
            'direccion'   => 'required',
            'tipo'        => 'required',
            'documento'   => 'required'
        ]);
        
        $rifa     = $request->rifa_id;
        $documento = $request->documento;
        $dateY    = date("Y");
        $datem    = date("m");
        $personal = substr($documento, -4);
        $random   = rand(10,1000);

        $num_control = $rifa . '-' . $datem . $random . '-' . $personal . '-' . $dateY;

        $ticket = Ticket::find($id);
        
        //$ticket->rifa_id     = $rifa;
        //$ticket->usuario_registra = $request->user_id;
        $ticket->nombre      = $request->nombre;
        $ticket->apellido    = $request->apellido;
        $ticket->telefono    = $request->telefono;
        $ticket->correo      = $request->correo;
        $ticket->direccion   = $request->direccion;
        $ticket->tipo        = $request->tipo; 
        $ticket->documento   = $documento;
        $ticket->institucion = $request->institucion; 
        $ticket->comentario  = $request->comentario;
        //$ticket->num_control = $num_control;

        $ticket->save();

        return redirect()->back()->with('data', ['Actualizado correctamente, por favor regresar al listado de tickets.']);
        
        //return redirect()->route('tickets.edit', $ticket->id)->with('success', 'Actualizado correctamente, por favor regresar al listado de tickets.');
    
        //return redirect()->action('TicketController@index');
    }

    public function show(Request $request, $id){
        
        $ticket = Ticket::find($id);

        $rifa = Rifa::orderBy('id', 'DESC')
                    ->where('id', '=', $ticket->rifa_id)->first();

        $logo   = public_path() . '/images/FUNDAEOE.png'; 

        // Send data to the view using loadView function of PDF facade
        //$pdf = PDF::loadView('tickets.show', $ticket);
        
        $nombreTicket = $ticket->nombre . $ticket->created_at . $ticket->documento;

        $header = '
            <table style="width:100%">
                <tr>
                    <td><img src="'.$logo.'"></td>   
                    <td><h3 align="right"><b>TICKET NRO.: '. $ticket->num_control .'</b></h3></td>
                </tr>
            </table><br><br>

            <h2 align="center">Nombre de la Rifa: '. $rifa->nombre .'</h2>

        ';
        
        $table = 
        '<table border="1" style="width:100%; border-collapse:collapse; border-spacing:0;">
        <tr>
            <td colspan="2" align="center"><b>Datos del Participante<b></td>
        </tr>
        <tr>
          <td><b>Nombre</b></td>
          <td>'. $ticket->nombre .'</td>
        </tr>
        <tr>
          <td><b>Apellido</b></td>
          <td>'. $ticket->apellido .'</td>
        </tr>
        <tr>
          <td><b>Teléfono</b></td>
          <td>'. $ticket->telefono .'</td>
        </tr>
        <tr>
          <td><b>Correo</b></td>
          <td>'. $ticket->correo .'</td>
        </tr>
        <tr>
          <td><b>Institución</b></td>
          <td>'. $ticket->institucion .'</td>
        </tr>
        <tr>
          <td><b>Tipo de Documento</b></td>
          <td>'. $ticket->tipo .'</td>
        </tr>
        <tr>
          <td><b>Documento de Identificación</b></td>
          <td>'. $ticket->documento .'</td>
        </tr>
        <tr>
          <td><b>Fecha de creación del ticket</b></td>
          <td>'. $ticket->created_at .'</td>
        </tr>
      </table>
        ';
        
        $footer = '
        
            <br><br><div style="border: 2px solid; padding: 10px; width: 100%">
            
            <p><b>Importante:</b> '. $rifa->clausula .'<p>
            <p><b>Valor del ticket:</b> '. $rifa->moneda . ' ' . $rifa->valor_ticket .'<p>
            <p><b>País:</b> '. $rifa->pais .'</p>
            <p><b>Ciudad:</b> '. $rifa->ciudad .'</p>
            <p><b>Fecha del concurso:</b> '. $rifa->fecha_fin .'</p>
            <p><b>Premio(s):</b> '. $rifa->premio .'<p>
            
            </div>
        
        '; 
        
        $html = $header . '<br/>';

        $html .= $table;

        $html .= $footer;
        
        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadHTML($html)->save('ticket-'. $nombreTicket .'.pdf');

        //$pdf->loadHTML($html);

        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(storage_path().'_filename.pdf');

        // Finally, you can download the file using download function
        return $pdf->download('ticket-'. $nombreTicket .'.pdf');

    }

    public function destroy($id){

        $ticket = Ticket::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');

    }
}
