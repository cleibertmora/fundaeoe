<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Evento;

use App\Ponente;

use App\EventoPonente;

use App\Aval;

use App\Instituto;

use App\Paquete;

use App\Etapa;

use App\CliPaq;



class EventoController extends Controller

{

    public function index(Request $request)

    {

        $eventos = Evento::search($request->buscar)->orderBy('titulo')->paginate(10);

        return view('admin.evento.index')->with('eventos', $eventos);

    }



    public function create()

    {

        return view('admin.evento.create');

    }



    public function store(Request $request)

    {

        $evento = new Evento($request->all());

        //dd($evento);
        
        $file = $request->file('afiche');

        if (!is_null($file)) {

            $name = 'fundaeoe_afiche' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/afiProx/';

            $file->move($path, $name);

            $evento->afiche = $name;

        }

        $file = $request->file('banner');

        if (!is_null($file)) {

            $name = 'fundaeoe_banner' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/afiProx/';

            $file->move($path, $name);

            $evento->banner = $name;

        }

        $evento->fechaI =  \DateTime::createFromFormat('d/m/Y', $evento->fechaI)->format('Y-m-d');

        $evento->fechaF =  \DateTime::createFromFormat('d/m/Y', $evento->fechaF)->format('Y-m-d');

        $evento->save();

        return redirect()->route('evento.index');   

    }



    public function show($id)

    {

        return redirect()->route('evento.index');

    }



    public function edit($id)

    {

        $evento = Evento::find($id);

        return view('admin.evento.edit')->with('evento', $evento);

    }



    public function update(Request $request, $id)

    {

        $evento = Evento::find($id);

        $evento->titulo = $request->titulo;

        $evento->fechaI = \DateTime::createFromFormat('d/m/Y', $request->fechaI)->format('Y-m-d');

        $evento->fechaF = \DateTime::createFromFormat('d/m/Y', $request->fechaF)->format('Y-m-d');

        $evento->capacidad = $request->capacidad;

        $evento->horasA = $request->horasA;

        $evento->horasC = $request->horasC;

        $evento->notas = $request->notas;

        $evento->direccion = $request->direccion;

        $evento->gps1 = $request->gps1;

        $evento->gps2 = $request->gps2;

        $evento->condicion = $request->condicion;

        $evento->costo = $request->costo;

        $evento->Moneda = $request->Moneda;

        $evento->MonedaCambio = $request->MonedaCambio;

        $evento->mapa = $request->mapa;

        $evento->participacion = $request->participacion;

        $file = $request->file('afiche');

        if (!is_null($file)) {

            $name = 'fundaeoe_afiche' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/afiProx/';

            $file->move($path, $name);

            $evento->afiche = $name;

        }

        $file = $request->file('banner');

        if (!is_null($file)) {

            $name = 'fundaeoe_banner' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/afiProx/';

            $file->move($path, $name);

            $evento->banner = $name;

        }

        $evento->save();

        return redirect()->route('evento.index');

    }



    public function destroy($id)

    {

        $evento = Evento::find($id);

        $evento->delete();

        return redirect()->route('evento.index');    

    }



    public function reporte($id)

    {

        $evento         = Evento::find($id);

	    $clipaqs        = CliPaq::groupBy('user_id')->having('evento_id', '=', $id)->get();

        return view('admin.evento.reporte')

	    ->with('clipaqs', $clipaqs)

            ->with('evento', $evento);

    }



    public function extend($id)

    {

        $ponentes       = Ponente::orderBy('nombre')->get()->pluck('full_name', 'id');

        $institutos     = Instituto::orderBy('descripcion')->get()->pluck('descripcion', 'id');

        $evento         = Evento::find($id);

        $eventoponentes = $evento->Ponentes()->get()->pluck('Ponente.full_name', 'id');

        $avaladopor     = Aval::where('evento_id','=',$id)->get()->pluck('Instituto.descripcion', 'id');

        $paquetes       = Paquete::where('evento_id','=',$id)->orderBy('titulo','ASC')->get();

        return view('admin.evento.extend')

            ->with('evento', $evento)

            ->with('ponentes', $ponentes)

            ->with('paquetes', $paquetes)

            ->with('institutos', $institutos)

            ->with('eventoponentes', $eventoponentes)

            ->with('avaladopor', $avaladopor);

    }



    public function add_ponente(Request $request)

    {

        $evento        = Evento::find($request->id);

        $eventoponente = new EventoPonente();

        $eventoponente->evento_id  = $request->id;

        $eventoponente->ponente_id = $request->ponente;

        $eventoponente->tema       = $request->tema;

        $eventoponente->fecha      = \DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');

        $eventoponente->hora       = date("G:i", strtotime($request->hora));

        $eventoponente->save();

        $eventoponentes = $evento->Ponentes()->get()->pluck('Ponente.full_name', 'id');

        return \Response::json($eventoponentes);

    }



    public function del_ponente(Request $request)

    {

        $evento = Evento::find($request->id);

        if (isset($request->eponentes)) {

            foreach ($request->eponentes as $index => $ponente) {

                $bponente = EventoPonente::find($ponente);

                $bponente->delete();

            }

        }

        $eventoponentes = $evento->Ponentes()->get()->pluck('Ponente.full_name', 'id');

        return \Response::json($eventoponentes);

    }



    public function add_aval(Request $request)

    {

        $evento             = Evento::find($request->id);

        $aval               = new Aval();

        $aval->evento_id    = $request->id;

        $aval->instituto_id = $request->instituto;

        $aval->save();

        $avaladopor     = Aval::where('evento_id','=',$request->id)->get()->pluck('Instituto.descripcion', 'id');

        return \Response::json($avaladopor);

    }



    public function del_aval(Request $request)

    {

        $evento = Evento::find($request->id);

        if (isset($request->avales)) {

            foreach ($request->avales as $index => $aval) {

                $baval = Aval::find($aval);

                $baval->delete();

            }

        }

        $avaladopor     = Aval::where('evento_id','=',$request->id)->get()->pluck('Instituto.descripcion', 'id');

        return \Response::json($avaladopor);

    }



    public function add_paquete(Request $request)

    {

        $evento                = Evento::find($request->id);

        $paquete               = new Paquete();

        $paquete->evento_id    = $request->id;

        $paquete->tipo         = $request->tipo;

        $paquete->titulo       = $request->titulo;

        $paquete->detalles     = $request->detalles;

        $paquete->costo        = $request->costo;

        $paquete->vence        = \DateTime::createFromFormat('d/m/Y', $request->vence)->format('Y-m-d');

        $paquete->persona      = $request->persona;

        $paquete->aplicable    = $request->aplicable;

        $paquete->compatible   = $request->compatible;

        $paquete->save();

        return redirect()->route('evento.extend', $evento->id);

    }



    public function del_paquete(Request $request)

    {

        $evento = Evento::find($request->id);

        $paquete = Paquete::find($request->idp);

        $paquete->delete();

        return redirect()->route('evento.extend', $evento->id);

    }



    public function add_etapa(Request $request)

    {

        $evento                = Evento::find($request->id);

        $etapa                 = new Etapa();

        $etapa->tipo           = $request->tipo;

        $etapa->evento_id      = $request->id;

        $etapa->paquete_id     = $request->idp;

        $etapa->titulo         = $request->titulo;

        $etapa->descuento      = $request->descuento;

        $etapa->costo          = $request->costo;

        $etapa->financiamiento = $request->financiamiento;

        $etapa->fechaI         = \DateTime::createFromFormat('d/m/Y', $request->fechaI)->format('Y-m-d');

        $etapa->fechaF         = \DateTime::createFromFormat('d/m/Y', $request->fechaF)->format('Y-m-d');

        $etapa->save();

        return redirect()->route('evento.extend', $evento->id);

    }



    public function del_etapa(Request $request)

    {

        $evento = Evento::find($request->id);

        $etapa = Etapa::find($request->ide);

        $etapa->delete();

        return redirect()->route('evento.extend', $evento->id);

    }



}

