@extends('template.main')

@section('title', 'Crear Evento')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Crear Evento</h1>
    
    {!! Form::open(['route' => 'evento.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
        {!! Form::label('titulo','Título:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Título del Evento']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('participacion','Participación:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('participacion', ['nacional' => 'Nacional', 'internacional' => 'Internacional', 'mixto' => 'Mixto'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('type','Tipo de Evento:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('type', ['congreso' => 'Congreso', 'curso' => 'Curso', 'diplomado' => 'Diplomado', 'jornada' => 'Jornada', 'capacitación' => 'Capacitación', 'emprendimiento' => 'Emprendimiento'], null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::label('capacidad','Capacidad:', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-1">
            {!! Form::text('capacidad', null, ['class' => 'form-control', 'placeholder' => 'Cap.']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('condicion','Condición:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::select('condicion', ['1' => 'Por Iniciar', '2' => 'Finalizado', '3' => 'Congelado'], null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::label('costo','Costo:', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('costo', null, ['class' => 'form-control', 'placeholder' => 'Costo']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('moneda','Moneda:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('Moneda', null, ['class' => 'form-control', 'placeholder' => 'Ej. COP']) !!}
        </div>
        {!! Form::label('MonedaCambio','Cambio:', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('MonedaCambio', null, ['class' => 'form-control', 'placeholder' => 'Bs por Divisa']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('valorDolar','Valor en dolares $:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('valorDolar', null, ['class' => 'form-control', 'placeholder' => 'Valor en dolares']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('inicial','% Inicial:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('inicial', null, ['class' => 'form-control', 'placeholder' => 'Ej. 40']) !!}
        </div>
        {!! Form::label('ncuotas','Numero de Cuotas:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('ncuotas', null, ['class' => 'form-control', 'placeholder' => 'Ej. 3']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('direccion','Dirección:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Dirección del Evento']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-6"><hr></div>
        <div class="col-sm-2"></div>
    </div>

    <div class='form-group'>
        {!! Form::label('fechaI','Fecha de Inicio:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <div class='input-group date' id='fechaI'>
                {!! Form::text('fechaI', null, ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA', 'required']) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="col-sm-2">
            {!! Form::label('fechaF', 'Fecha de Finalización:') !!}
        </div>
        <div class="col-sm-2">
            <div class='input-group date' id='fechaF'>
                {!! Form::text('fechaF', null, ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA', 'required']) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('horasA','Horas Académicas:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('horasA', null, ['class' => 'form-control', 'placeholder' => 'Horas Académicas']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::label('horasC', 'Horas Totales:') !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('horasC', null, ['class' => 'form-control', 'placeholder' => 'Horas Totales']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('notas','Notas:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('notas', null, ['class' => 'form-control', 'placeholder' => 'Notas del Evento', 'id' => 'mytextarea']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('gps1','GPS 1:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('gps1', null, ['class' => 'form-control', 'placeholder' => 'GPS' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('gps2','GPS 2:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('gps2', null, ['class' => 'form-control', 'placeholder' => 'GPS' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('mapa','Mapa:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('mapa', null, ['class' => 'form-control', 'placeholder' => 'Código de Google Maps' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('afiche','Afiche:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::file('afiche', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('banner','Banner:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::file('banner', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Crear Evento', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

</div>
@endsection
