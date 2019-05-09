@extends('template.main')

@section('title', 'Mis Eventos')
@section('content')

@php ( $costo = 0)
@php ( $pago  = 0)
@foreach($eventosI as $cuenta)
    @foreach($clipaqs as $clipaq)
    @if ($clipaq->evento_id == $cuenta->Evento->id)
        @if (Auth::user()->pais <> "VE" )
           @php ( $costo = $costo + $clipaq->costo / $cuenta->Evento->MonedaCambio)
        @else
            @php ( $costo = $costo + $clipaq->costo)
        @endif
        @php ( $pago  = $pago  + $clipaq->abonado)
    @endif
    @endforeach
@endforeach
@php ( $deuda = $costo - $pago)

<section  id="blog">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title text-center wow fadeInDown">Mis Eventos</h2>
        </div>
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#infuser">
            Usuario: {{ Auth::user()->id }} - {{ Auth::user()->fullName }}
            <span class="glyphicon glyphicon-chevron-down" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
        </button>
        <div id="infuser" class="collapse in row">
            <br>
            <div class="col-md-5 wow fadeInLeft">
                <table class="table table-striped">
                    <tr>
                        <td width="50%" style="text-align:right;">{{ number_format(Auth::user()->saldo, 2, ",", ".") }}</td>
                        <td width="50%" style="text-align:left;">Saldo a Favor</td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align:right;">{{ number_format($costo, 2, ",", ".") }}</td>
                        <td width="50%" style="text-align:left;">Monto Contratado</td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align:right;">{{ number_format($pago, 2, ",", ".") }}</td>
                        <td width="50%" style="text-align:left;">Monto Cancelado</td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align:right;"><b>{{ number_format($deuda, 2, ",", ".") }}</b></td>
                        <td width="50%" style="text-align:left;"><b>Saldo por Pagar</b></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-7"></div>
        </div>
        <br><br>
        <div>
            <h3 class="section-title text-center wow fadeInDown">Próximos Eventos</h2>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInLeft">
                <table class="table table-striped text-center">
                    <thead>
                        <th width="10%"></th>
                        <th width="45%">Evento</th>
                        <th width="15%" style="text-align:center;">Desde el</th>
                        <th width="15%" style="text-align:center;">Hasta el</th>
                        <th width="15%"></th>
                    </thead>
                    <tbody>
                        @foreach($eventos as $evento)
                            <tr>
                                <td style="vertical-align:middle">
                                    @php ($condicion=1)
                                    @foreach ($eventosI as $cuenta)
                                        @if ($cuenta->evento_id == $evento->id)
                                            @php ($condicion=0)
                                        @endif
                                    @endforeach
                                    @if ($condicion)
                                        @if ($evento->condicion == '2')
                                            <span class="label label-danger">No disponible</span>
                                        @else
                                            <span class="label label-primary">Disponible</span>
                                        @endif
                                    @else
                                        <span class="label label-success">YA Inscrito</span>
                                    @endif
                                </td>
                                <td style="vertical-align:middle; text-align:left;">{!! $evento->titulo !!}</td>
                                <td style="vertical-align:middle">{{ date_format(date_create($evento->fechaI), 'd-m-Y') }}</td>
                                <td style="vertical-align:middle">{{ date_format(date_create($evento->fechaF), 'd-m-Y') }}</td>
                                <td style="vertical-align:middle">
                                    <a href="{{ route('eventos.evento', $evento->id) }}" class="btn btn-info" data-toggle="tooltip" title="Ver Detalles">
                                        <span class="glyphicon glyphicon-zoom-in" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('eventos.evento', $evento->id) }}#paquetes" class="btn-success btn" data-toggle="tooltip" title="Inscribirme">
                                        <span class="glyphicon glyphicon-ok" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $eventos->render() !!}
            </div>
        </div>
        <br><br>
        @if (count($eventosI))
            <div>
                <h3 class="section-title text-center wow fadeInDown">Eventos en los que estoy @if (Auth::user()->sexo == 'M') inscrito: @else inscrita: @endif {{ count($eventosI) }}</h3>
            </div>
            <div class="row">
                <div class="col-md-12 wow fadeInLeft">
                    <table class="table table-striped text-center">
                        <thead>
                            <th width="5%"></th>
                            <th width="10%">Evento</th>
                            <th width="55%"></th>
                            <th width="10%"></th>
                            <th width="15%"></th>
                        </thead>
                        <tbody>
                            @foreach($eventosI as $cuenta)
                                <tr style="background-color:#99ffd6" data-toggle="collapse" data-target=".evento{{$cuenta->id}}">
                                    <td style="vertical-align:middle">
                                        <a href="{{ route('eventos.eliminarEv', $evento->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')" class="btn-danger btn" data-toggle="tooltip" title="Eliminar">
                                            <span class="glyphicon glyphicon-remove" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td colspan="2" style="vertical-align:middle; text-align:left;"><b>{!! $cuenta->Evento->titulo !!}</b><br> Fecha de Inscripción el {{ date_format(date_create($cuenta->fec), 'd-m-Y') }}</td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle">
                                        <button type="button" class="close">
                                            <span class="glyphicon glyphicon-chevron-down" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                        </button>
                                    </td>
                                </tr>
                                @foreach($clipaqs as $clipaq)
                                @if ($clipaq->evento_id == $cuenta->Evento->id)
                                    <tr class="collapse in evento{{$cuenta->id}}">
                                        <td></td>
                                        <td style="vertical-align:middle;">
                                            <a href="{{ route('eventos.eliminarEt', $clipaq->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')" class="btn-danger btn" data-toggle="tooltip" title="Eliminar">
                                                <span class="glyphicon glyphicon-remove" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                            </a>
                                            @if (Auth::user()->pais <> "VE" )
                                                @if ($clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado)
                                                    <a href="{{ route('eventos.pagarEt', $clipaq->id) }}" class="btn-warning btn" data-toggle="tooltip" title="Registrar Pago">
                                                        <span class="glyphicon glyphicon-usd" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                                    </a>
                                                @else
                                                    <span class="label label-success">Pagado</span>
                                                @endif
                                            @else
                                                 @if ($clipaq->costo - $clipaq->abonado)
                                                    <a href="{{ route('eventos.pagarEt', $clipaq->id) }}" class="btn-warning btn" data-toggle="tooltip" title="Registrar Pago">
                                                        <span class="glyphicon glyphicon-usd" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                                    </a>
                                                @else
                                                    <span class="label label-success">Pagado</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle; text-align:left;">
                                            {{ $clipaq->Paquete->titulo }}<br>
                                            {{ $clipaq->Etapa->titulo }}
                                        </td>
                                        <td style="vertical-align:middle; text-align:right;">
                                            Costo: <br>
                                            Pago:  <br>
                                            Deuda: 
                                        </td>
                                        </td>
                                        <td style="vertical-align:middle; text-align:right;">
                                            @if (Auth::user()->pais <> "VE" )
                                                {{ number_format($clipaq->costo / $cuenta->Evento->MonedaCambio, 2, ",", ".") }}<br>
                                                {{ number_format($clipaq->abonado, 2, ",", ".") }}<br>
                                                {{ number_format($clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado, 2, ",", ".") }}</td>
                                            @else
                                                {{ number_format($clipaq->costo, 2, ",", ".") }}<br>
                                                {{ number_format($clipaq->abonado, 2, ",", ".") }}<br>
                                                {{ number_format($clipaq->costo - $clipaq->abonado, 2, ",", ".") }}</td>
                                            @endif
                                    </tr>
                                @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
        @endif
        @if (count($pagos))
            <div>
                <h3 class="section-title text-center wow fadeInDown">Mis Pagos</h2>
            </div>
            <div class="row">
                <div class="col-md-12 wow fadeInLeft">
                    <table class="table table-striped text-center">
                        <thead>
                            <th width=" 7%" style="text-align:center;"">ID Pago</th>
                            <th width="35%">Evento</th>
                            <th width=" 8%" style="text-align:center;">Fecha</th>
                            <th width="15%" style="text-align:center;">Referencia</th>
                            <th width="15%" style="text-align:center;">Forma de Pago</th>
                            <th width="10%" style="text-align:center;">Monto</th>
                            <th width="10%" style="text-align:center;">Condición</th>
                        </thead>
                        <tbody>
                            @foreach($pagos as $pago)
                                <tr>
                                    <td style="vertical-align:middle">{{ $pago->id }}</td>
                                    <td style="vertical-align:middle; text-align:left;">{{ $pago->Evento->titulo }}</td>
                                    <td style="vertical-align:middle">{{ date_format(date_create($pago->fechaTrans), 'd-m-Y') }}</td>
                                    <td style="vertical-align:middle">{{ $pago->documento }}</td>
                                    <td style="vertical-align:middle">{{ $pago->FPago->forma }}</td>
                                    <td style="vertical-align:middle">{{ number_format($pago->monto, 2, ",", ".") }}</td>
                                    <td style="vertical-align:middle">
                                        @if ($pago->condicion==0)
                                            <span class="label label-warning">Por Verificar</span>
                                        @elseif ($pago->condicion==1)
                                            <span class="label label-success">Verificado</span>
                                        @else
                                            <span class="label label-danger">Rechazado</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
