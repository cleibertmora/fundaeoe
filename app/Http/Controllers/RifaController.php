<?php



namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Collection;

use App\User;

use App\Rifa;

use App\Ticket;



class RifaController extends Controller

{

    public function index(){

        $rifas = Rifa::all();
        
        return view('admin.rifas.index', compact('rifas'));
    }

    public function create(){
        $users = DB::table('users')
        ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"), 'id', 'tipoDocumento' ,'documento')
        ->where('type', '=', 'colaborador')
        ->orderBy('id', 'DESC')
        ->get();
        
        //return dd($users);
        
        return view('admin.rifas.create', compact('users'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'nombre'      => 'required',
            'pais'        => 'required',
            'ciudad'      => 'required',
            'fecha_in'    => 'required',
            'fecha_fin'   => 'required'
        ]);
        
        $rifa = new Rifa;

        $rifa->user_id     = $request->user_id;
        $rifa->nombre      = $request->nombre;
        $rifa->pais        = $request->pais;
        $rifa->ciudad      = $request->ciudad;
        $rifa->descripcion = $request->descripcion;
        $rifa->valor_ticket= $request->valor_ticket;
        $rifa->clausula    = $request->clausula;
        $rifa->premio      = $request->premio;

        $rifa->fecha_in = \DateTime::createFromFormat('d/m/Y', $request->fecha_in)->format('Y-m-d');
        $rifa->fecha_fin = \DateTime::createFromFormat('d/m/Y', $request->fecha_fin)->format('Y-m-d');

        $rifa->status  = $request->status;
        
        $rifa->save();

        $rifa->users()->attach($request->get('users'));

        //dd($hi);

        return redirect()->route('rifas.index');

    }

    public function edit($id)
    {
        $rifa = Rifa::find($id);

        $users = DB::table('users')
        ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"), 'id', 'tipoDocumento' ,'documento')
        ->where('type', '=', 'colaborador')
        ->orderBy('id', 'DESC')
        ->get();

        //return dd($rifa.$users);

        return view('admin.rifas.edit', compact('rifa', 'users'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre'      => 'required',
            'pais'        => 'required',
            'ciudad'      => 'required',
            'fecha_in'    => 'required',
            'fecha_fin'   => 'required'
        ]);

        $rifa = Rifa::find($id);

        $rifa->user_id     = $request->user_id;
        $rifa->nombre      = $request->nombre;
        $rifa->pais        = $request->pais;
        $rifa->ciudad      = $request->ciudad;
        $rifa->descripcion = $request->descripcion;
        $rifa->valor_ticket= $request->valor_ticket;
        $rifa->clausula    = $request->clausula;
        $rifa->premio      = $request->premio;
        $rifa->moneda      = $request->moneda;

        $rifa->fecha_in = \DateTime::createFromFormat('d/m/Y', $request->fecha_in)->format('Y-m-d');
        $rifa->fecha_fin = \DateTime::createFromFormat('d/m/Y', $request->fecha_fin)->format('Y-m-d');

        $rifa->status  = $request->status;
        
        $rifa->save();

        $users = $request->get('users');

        if($users!=null){
            $rifa->users()->sync($users);
        }else{
            $rifa->users()->detach();
        }

        return redirect()->route('rifas.index');
    }

    public function reporte(Request $request){

        $rifas = Rifa::orderBy('id', 'DESC')->pluck('nombre', 'id');

        $users = User::orderBy('id', 'DESC')->where('type', '=', 'colaborador')->orWhere('type', '=', 'admin')->pluck('primerNombre' . '', 'id');
        
        $rifa        = $request->get('rifa');
        $colaborador = $request->get('colaborador');

        if($rifa && $colaborador){
            $rifa        = $request->get('rifa');
            $colaborador = $request->get('colaborador');
        }else{
            $rifa        = false;
            $colaborador = false;
        }

        $tickets = DB::table('tickets_rifas')
                   ->select(DB::raw("rifas.nombre AS rifa, rifas.moneda, tickets_rifas.*, rifas.ciudad, rifas.pais, rifas.valor_ticket, CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"))
                   ->join('rifas', 'tickets_rifas.rifa_id', '=', 'rifas.id')
                   ->join('users', 'tickets_rifas.usuario_registra', '=', 'users.id')
                   ->when($rifa, function ($query) use ($rifa) {
                        return $query->where('rifa_id', '=', $rifa);
                    })
                    ->when($colaborador, function ($query) use ($colaborador) {
                        return $query->where('usuario_registra', '=', $colaborador);
                    })
                   ->get();
        
        $total_venta = 0;
        
        foreach($tickets as $ticket){
            $total_venta += $ticket->valor_ticket;
        }
        /*
        $users = DB::table('users')
                ->select(DB::raw("CONCAT(users.primerNombre, ' ', if(users.segundoNombre is null,'', users.segundoNombre), ' ', users.primerApellido, ' ', if(users.segundoApellido is null,'', users.segundoApellido)) AS fullName"), 'id')
                ->where('type', '=', 'colaborador')
                ->orderBy('id', 'DESC')
                ->get();
        */

        return view('admin.rifas.reporte', compact('rifas', 'users', 'tickets', 'total_venta'));
    
    }

    public function show(){
        //some code
    }

}

