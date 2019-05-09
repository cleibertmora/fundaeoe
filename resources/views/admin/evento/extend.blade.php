@extends('template.main')

@section('title', 'Complementar Evento')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>{!! $evento->titulo !!}</h1>

    <!-- PONENTES 
         ======================================================================================================== -->
    <a name="ponentes"></a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Ponentes</h3>
        </div>
        <div class="panel-body text-center">
            <div class="col-sm-8">
                {!! Form::open(['route' => ['evento.ponente_add'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('ponente','Ponente:', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::select('ponente', $ponentes, null, ['class' => 'form-control', 'id' => 'ponente']) !!}
                    </div>
                    <div class="col-sm-1">
                        {{ Form::button('Agregar <span class="glyphicon glyphicon-arrow-right"></span>', ['type' => 'button', 'class' => 'btn btn-primary', 'id' => 'btn-save-ponente']) }}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tema','Tema:', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('tema', null, ['class' => 'form-control', 'placeholder' => 'Tema', 'id' => 'tema-ponente']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('fecha','Fecha:', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-3">
                        <div class='input-group date' id='fechaI'>
                            {!! Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA', 'id' => 'fecha-ponente']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    {!! Form::label('hora','Hora:', ['class' => 'col-sm-1 control-label']) !!}
                    <div class="col-sm-3">
                        <div class='input-group date' id='hora'>
                            {!! Form::text('hora', null, ['class' => 'form-control', 'placeholder' => 'HH:MM', 'id' => 'hora-ponente']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
                {!! Form::hidden('id', $evento->id, ['id' => 'id-ponente']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-sm-4">
                {!! Form::open(['route' => ['evento.ponente_del'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                    {!! Form::select('eponentes[]', $eventoponentes, $selected = null, ['id' => 'selectID-ponente', 'style' => 'height:7em', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
                    {!! Form::hidden('id', $evento->id, ['id' => 'id-ponente']) !!}
                    {!! Form::button('Borrar', ['type' => 'button', 'class' => 'btn btn-primary btn-block', 'id' => 'btn-delete-ponente']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- AVALES
         ======================================================================================================== -->
    <a name="avales"></a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Avalado por</h3>
        </div>
        <div class="panel-body text-center">
            <div class="col-sm-8">
                {!! Form::open(['route' => ['evento.aval_add'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('intituto','Institución:', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::select('instituto', $institutos, null, ['class' => 'form-control', 'id' => 'instituto']) !!}
                    </div>
                    <div class="col-sm-1">
                        {{ Form::button('Agregar <span class="glyphicon glyphicon-arrow-right"></span>', ['type' => 'button', 'class' => 'btn btn-primary', 'id' => 'btn-save-aval']) }}
                    </div>
                </div>
                {!! Form::hidden('id', $evento->id, ['id' => 'id-aval']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-sm-4">
                {!! Form::open(['route' => ['evento.aval_del'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                    {!! Form::select('avales[]', $avaladopor, $selected = null, ['id' => 'selectID-aval', 'style' => 'height:7em', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
                    {!! Form::hidden('id', $evento->id, ['id' => 'id-aval']) !!}
                    {!! Form::button('Borrar', ['type' => 'button', 'class' => 'btn btn-primary btn-block', 'id' => 'btn-delete-aval']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- PAQUETES
         ======================================================================================================== -->
    <a name="paquete"></a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Paquetes y Precios</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped text-center">
                <thead>
                    <th width="36%">Título</th>
                    <th width="10%" style="text-align:center;">Detalle</th>
                    <th width="10%" style="text-align:center;">Costo</th>
                    <th width="10%" style="text-align:center;">Vence</th>
                    <th width="10%" style="text-align:center;">Persona</th>
                    <th width="10%" style="text-align:center;">Aplicable</th>
                    <th width="10%" style="text-align:center;">Compatible</th>
                    <th width="4%"></th>
                </thead>
                <tbody>
                    @foreach($paquetes as $paquete)
                        @if ($paquete->tipo == "PAQUETE")
                            <tr>
                                <td style="vertical-align:middle; text-align:left;">{{ $paquete->titulo }}</td>
                                <td style="vertical-align:middle; text-align:left;">
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#pqt{{ $paquete->id }}">Ver Detalle</a>
                                </td>
                                <td style="vertical-align:middle">{{ number_format($paquete->costo, 2, ",", ".") }}</td>
                                <td style="vertical-align:middle">{{ date_format(date_create($paquete->vence), 'd-m-Y') }}</td>
                                <td style="vertical-align:middle">{{ $paquete->persona }}</td>
                                <td style="vertical-align:middle">{{ $paquete->aplicable }}</td>
                                <td style="vertical-align:middle">{{ $paquete->compatible }}</td>
                                <td style="vertical-align:middle">
                                    <a href="{{ route('evento.paquete_del', [$evento->id, $paquete->id]) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            @foreach($paquetes as $paquete)
                @if ($paquete->tipo == "PAQUETE")
                    <div class="modal fade" id="pqt{{ $paquete->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">{{ $paquete->titulo }}</h4>
                                </div>
                                <div class="modal-body">
                                    {!! $paquete->detalles !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
                                </div>
                            </div>
                        </div>  
                    </div>
                @endif
            @endforeach

            <!-- PAQUETE
                 =============================================================================================== -->
            <a name="paquete"></a>
            <div class="col-sm-12">
                {!! Form::open(['route' => ['evento.paquete_add'], 'method' => 'POST', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'novalidate']) !!}
                    {!! Form::hidden('id', $evento->id) !!}
                    {!! Form::hidden('tipo', 'PAQUETE') !!}
                    {!! Form::hidden('anchor', 'p') !!}
                    <div class="form-group">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            {{ Form::button('Agregar <span class="glyphicon glyphicon-arrow-up"></span>', ['type' => 'submit', 'class' => 'btn btn-block btn-primary']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('titulo','Título:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::text('titulo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Título del Paquete' ]) !!}
                        </div>
                        {!! Form::label('costo','Costo:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::text('costo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Costo' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('detalles','Detalles:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('detalles', null, ['class' => 'form-control', 'required', 'placeholder' => 'Detalles del Paquete', 'id' => 'mytextareapq' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('vence','Fecha de Vencimiento:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-2">
                            <div class='input-group date' id='fechaPQ'>
                                {!! Form::text('vence', null, ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        {!! Form::label('persona','Persona:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-1">
                            {!! Form::text('persona', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                        </div>
                        {!! Form::label('aplicable','Aplicable:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::text('aplicable', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                        </div>
                        {!! Form::label('compatible','Compatible:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::text('compatible', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="col-sm-12"><hr><br></div>

            <ul class="nav nav-tabs">
                @php ($active = 1)
                @foreach($paquetes as $paquete)
                    @if ($paquete->tipo == 'PAQUETE')
                        <li @if ($active == 1) class="active" @endif><a data-toggle="tab" href="#paq{{ $paquete->id }}">{{ $paquete->titulo }}</a></li>
                        @php ($active = 0)
                    @endif
                @endforeach
            </ul>
            <div class="tab-content">
                @php ($active = 1)
                @foreach($paquetes as $paquete)
                    @if ($paquete->tipo == 'PAQUETE')
                        <div id="paq{{ $paquete->id }}" class="tab-pane @if ($active==1) active @endif">
                            @php ($active = 0)
                            <table class="table table-striped">
                                <thead>
                                    <th width="47%">Etapa</th>
                                    <th class="text-center" width="12%">Descuento %</th>
                                    <th class="text-center" width="12%">Costo</th>
                                    <th class="text-center" width="12%">Fecha Inicio</th>
                                    <th class="text-center" width="12%">Fecha Límite</th>
                                    <th width="5%"></th>
                                </thead>
                                @foreach($evento->Etapas as $etapa)
                                    @if ($etapa->paquete_id == $paquete->id)
                                        <tr>
                                            <td>{{$etapa->titulo }}</td>
                                            <td align="center">{{ $etapa->descuento }}</td>
                                            <td align="right"> {{ number_format($paquete->costo, 2, ",", ".") }}</td>
                                            <td align="center">{{ date_format(date_create($etapa->fechaI), 'd-m-Y') }}</td>
                                            <td align="center">{{ date_format(date_create($etapa->fechaF), 'd-m-Y') }}</td>
                                            <td style="vertical-align:middle">
                                                <a href="{{ route('evento.etapa_del', [$evento->id, $etapa->id]) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                                                <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                            <!-- AVALES
                                 ================================================================================= -->
                            <a name="paqueteEtapa"></a>
                            <div>
                                {!! Form::open(['route' => ['evento.etapa_add'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                                    {!! Form::hidden('id', $evento->id) !!}
                                    {!! Form::hidden('idp', $paquete->id) !!}
                                    {!! Form::hidden('tipo', 'E') !!}
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            {{ Form::button('Agregar <span class="glyphicon glyphicon-arrow-up"></span>', ['type' => 'submit', 'class' => 'btn btn-block btn-primary']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('titulo','Etapa:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-7">
                                            {!! Form::text('titulo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Título de la Etapa' ]) !!}
                                        </div>
                                        {!! Form::label('costo','Costo:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            {!! Form::text('costo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Costo' ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fechaI','Fecha Inicial:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-2">
                                            <div class='input-group date' id='fechaIPQ'>
                                                {!! Form::text('fechaI', null, ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        {!! Form::label('fechaF','Fecha Límite:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            <div class='input-group date' id='fechaFPQ'>
                                                {!! Form::text('fechaF', null, ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        {!! Form::label('descuento','Descuento:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-1">
                                            {!! Form::text('descuento', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                                        </div>
                                        {!! Form::label('tipo','Tipo:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            {!! Form::select('tipo', ['E' => 'Evento', 'R' => 'Reserva'], null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fpago','Forma de Pago:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-4">
                                            {!! Form::select('financiamiento',['punico' => 'Pago Unico', 'financiado' => 'Financiado'],  null, ['class' => 'form-control' ]) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <a name="adicional"></a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Adicionales y Precios</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped text-center">
                <thead>
                    <th width="36%">Título</th>
                    <th width="10%" style="text-align:center;">Detalle</th>
                    <th width="10%" style="text-align:center;">Costo</th>
                    <th width="10%" style="text-align:center;">Vence</th>
                    <th width="10%" style="text-align:center;">Persona</th>
                    <th width="10%" style="text-align:center;">Aplicable</th>
                    <th width="10%" style="text-align:center;">Compatible</th>
                    <th width="4%"></th>
                </thead>
                <tbody>
                    @foreach($paquetes as $paquete)
                        @if ($paquete->tipo != "PAQUETE")
                            <tr>
                                <td style="vertical-align:middle; text-align:left;">{{ $paquete->titulo }}</td>
                                <td style="vertical-align:middle; text-align:left;">
                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#pqt{{ $paquete->id }}">Ver Detalle</a>
                                </td>
                                <td style="vertical-align:middle">{{ number_format($paquete->costo, 2, ",", ".") }}</td>
                                <td style="vertical-align:middle">{{ date_format(date_create($paquete->vence), 'd-m-Y') }}</td>
                                <td style="vertical-align:middle">{{ $paquete->persona }}</td>
                                <td style="vertical-align:middle">{{ $paquete->aplicable }}</td>
                                <td style="vertical-align:middle">{{ $paquete->compatible }}</td>
                                <td style="vertical-align:middle">
                                    <a href="{{ route('evento.paquete_del', [$evento->id, $paquete->id]) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            @foreach($paquetes as $paquete)
                @if ($paquete->tipo != "PAQUETE")
                    <div class="modal fade" id="pqt{{ $paquete->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">{{ $paquete->titulo }}</h4>
                                </div>
                                <div class="modal-body">
                                    {!! $paquete->detalles !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
                                </div>
                            </div>
                        </div>  
                    </div>
                @endif
            @endforeach

            <!-- ADICIONAL
                 =============================================================================================== -->
            <a name="paquete"></a>
            <div class="col-sm-12">
                {!! Form::open(['route' => ['evento.paquete_add'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'novalidate']) !!}
                    {!! Form::hidden('id', $evento->id) !!}
                    {!! Form::hidden('tipo', 'ADICIONAL') !!}
                    {!! Form::hidden('anchor', 'a') !!}
                    <div class="form-group">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            {{ Form::button('Agregar <span class="glyphicon glyphicon-arrow-up"></span>', ['type' => 'submit', 'class' => 'btn btn-block btn-primary']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('titulo','Título:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::text('titulo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Título del Adicional' ]) !!}
                        </div>
                        {!! Form::label('costo','Costo:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::text('costo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Costo' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('detalles','Detalles:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('detalles', null, ['class' => 'form-control', 'required', 'placeholder' => 'Detalles del Adicional', 'id' => 'mytextareaad' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('vence','Fecha de Vencimiento:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-2">
                            <div class='input-group date' id='fechaAD'>
                                {!! Form::text('vence', null, ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        {!! Form::label('persona','Persona:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-1">
                            {!! Form::text('persona', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                        </div>
                        {!! Form::label('aplicable','Aplicable:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::text('aplicable', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                        </div>
                        {!! Form::label('compatible','Compatible:', ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::text('compatible', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="col-sm-12"><hr><br></div>

            <ul class="nav nav-tabs">
                @php ($active = 1)
                @foreach($paquetes as $paquete)
                    @if ($paquete->tipo != 'PAQUETE')
                        <li @if ($active == 1) class="active" @endif><a data-toggle="tab" href="#paq{{ $paquete->id }}">{{ $paquete->titulo }}</a></li>
                        @php ($active = 0)
                    @endif
                @endforeach
            </ul>
            <div class="tab-content">
                @php ($active = 1)
                @foreach($paquetes as $paquete)
                    @if ($paquete->tipo != 'PAQUETE')
                        <div id="paq{{ $paquete->id }}" class="tab-pane @if ($active==1) active @endif">
                            @php ($active = 0)
                            <table class="table table-striped">
                                <thead>
                                    <th width="47%">Etapa</th>
                                    <th class="text-center" width="12%">Descuento %</th>
                                    <th class="text-center" width="12%">Costo</th>
                                    <th class="text-center" width="12%">Fecha Inicio</th>
                                    <th class="text-center" width="12%">Fecha Límite</th>
                                    <th width="5%"></th>
                                </thead>
                                @foreach($evento->Etapas as $etapa)
                                    @if ($etapa->paquete_id == $paquete->id)
                                        <tr>
                                            <td>{{$etapa->titulo }}</td>
                                            <td align="center">{{ $etapa->descuento }}</td>
                                            <td align="right"> {{ number_format($etapa->costo, 2, ",", ".") }}</td>
                                            <td align="center">{{ date_format(date_create($etapa->fechaI), 'd-m-Y') }}</td>
                                            <td align="center">{{ date_format(date_create($etapa->fechaF), 'd-m-Y') }}</td>

                                            <td style="vertical-align:middle">
                                                <a href="{{ route('evento.etapa_del', [$evento->id, $etapa->id]) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                                                <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                            <!-- AVALES
                                 ================================================================================= -->
                            <a name="adicionalEtapa"></a>
                            <div>
                                {!! Form::open(['route' => ['evento.etapa_add'], 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                                    {!! Form::hidden('id', $evento->id) !!}
                                    {!! Form::hidden('idp', $paquete->id) !!}
                                    {!! Form::hidden('anchor', 'eA') !!}
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            {{ Form::button('Agregar <span class="glyphicon glyphicon-arrow-up"></span>', ['type' => 'submit', 'class' => 'btn btn-block btn-primary']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('titulo','Etapa:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-7">
                                            {!! Form::text('titulo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Título de la Etapa' ]) !!}
                                        </div>
                                        {!! Form::label('costo','Costo:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            {!! Form::text('costo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Costo' ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fechaI','Fecha Inicial:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-2">
                                            <div class='input-group date' id='fechaIAD'>
                                                {!! Form::text('fechaI', null, ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        {!! Form::label('fechaF','Fecha Límite:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            <div class='input-group date' id='fechaFAD'>
                                                {!! Form::text('fechaF', null, ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        {!! Form::label('descuento','Descuento:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-1">
                                            {!! Form::text('descuento', null, ['class' => 'form-control', 'required', 'placeholder' => '' ]) !!}
                                        </div>
                                        {!! Form::label('tipo','Tipo:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            {!! Form::select('tipo', ['E' => 'Evento', 'R' => 'Reserva'], null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fpago','Forma de Pago:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-4">
                                            {!! Form::select('financiamiento',['punico' => 'Pago Unico', 'financiado' => 'Financiado'],  null, ['class' => 'form-control' ]) !!}
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
