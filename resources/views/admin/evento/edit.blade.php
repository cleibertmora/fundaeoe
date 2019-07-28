@extends('template.main')

@section('title', 'Editar Evento')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Editar Evento</h1>
    <div class="col-sm-8">
        {!! Form::open(['route' => ['evento.update',$evento], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('titulo','Título:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('titulo', $evento->titulo, ['class' => 'form-control', 'required', 'placeholder' => 'Título del Evento' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('participacion','Participación:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('participacion', ['nacional' => 'Nacional', 'internacional' => 'Internacional', 'mixto' => 'Mixto'], $evento->participacion, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('type','Tipo de Evento:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::select('type', ['congreso' => 'Congreso', 'curso' => 'Curso', 'diplomado' => 'Diplomado', 'jornada' => 'Jornada', 'capacitación' => 'Capacitación', 'emprendimiento' => 'Emprendimiento'], $evento->type, ['class' => 'form-control']) !!}
            </div>
            {!! Form::label('capacidad','Capacidad:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('capacidad', $evento->capacidad, ['class' => 'form-control', 'placeholder' => 'Cap.' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('condicion','Condición:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::select('condicion', ['1' => 'Por Iniciar', '2' => 'Finalizado', '3' => 'Congelado'], $evento->condicion, ['class' => 'form-control']) !!}
            </div>
            {!! Form::label('costo','Costo:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('costo', $evento->costo, ['class' => 'form-control', 'placeholder' => 'Costo' ]) !!}
            </div>
        </div>
        <div class="form-group">
           {!! Form::label('moneda','Moneda:', ['class' => 'col-sm-3 control-label']) !!}
           <div class="col-sm-5">
               {!! Form::text('Moneda', $evento->Moneda, ['class' => 'form-control', 'placeholder' => 'Ej. COP']) !!}
           </div>
           {!! Form::label('MonedaCambio','Cambio:', ['class' => 'col-sm-2 control-label']) !!}
           <div class="col-sm-2">
               {!! Form::text('MonedaCambio', $evento->MonedaCambio, ['class' => 'form-control', 'placeholder' => 'Bs por Divisa' ]) !!}
           </div>
        </div>
        <div class="form-group">
            {!! Form::label('valorDolar','Valor en dolares $:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('valorDolar', $evento->valorDolar, ['class' => 'form-control', 'placeholder' => 'Valor en dolares']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('inicial','% Inicial:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('inicial', $evento->inicial, ['class' => 'form-control', 'placeholder' => 'Ej. 40']) !!}
            </div>
            {!! Form::label('ncuotas','Numero de Cuotas:', ['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('ncuotas', $evento->ncuotas, ['class' => 'form-control', 'placeholder' => 'Ej. 3' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('direccion','Dirección:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('direccion', $evento->direccion, ['class' => 'form-control', 'placeholder' => 'Dirección del Evento' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9"><hr></div>
        </div>
        <div class='form-group'>
            {!! Form::label('fechaI','Fecha de Inicio:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                <div class='input-group date' id='fechaI'>
                    {!! Form::text('fechaI', date_format(date_create($evento->fechaI), 'd-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA', 'required']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-sm-3">
                {!! Form::label('fechaF', 'Fecha de Finalización:') !!}
            </div>
            <div class="col-sm-3">
                <div class='input-group date' id='fechaF'>
                    {!! Form::text('fechaF', date_format(date_create($evento->fechaF), 'd-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA', 'required']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('horasA','Horas Académicas:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('horasA', $evento->horasA, ['class' => 'form-control', 'placeholder' => 'Horas Académicas' ]) !!}
            </div>
            {!! Form::label('horasC','Horas Totales:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('horasC', $evento->horasC, ['class' => 'form-control', 'placeholder' => 'Horas Totales' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('notas','Notas:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::textarea('notas', $evento->notas, ['class' => 'form-control', 'placeholder' => 'Notas del Evento', 'id' => 'mytextarea' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('gps1','GPS 1:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('gps1', $evento->gps1, ['class' => 'form-control', 'placeholder' => 'GPS' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('gps2','GPS 2:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('gps2', $evento->gps2, ['class' => 'form-control', 'placeholder' => 'GPS' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('mapa','Mapa:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('mapa', $evento->mapa, ['class' => 'form-control', 'placeholder' => 'Código de Google Maps' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('afiche','Afiche:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::file('afiche', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('banner','Banner:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::file('banner', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Editar Evento', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-4">
        <div style="text-align:center;">
            <h4>Afiche</h4>
            @if($evento->afiche == '' or is_null($evento->afiche))
                <td style="text-align:center"><img src="/images/ND.gif" style="width:50%"></td>
            @else
                <td style="text-align:center"><img src="/images/afiProx/{{ $evento->afiche }}" style="width:50%"></td>
            @endif
        </div>
        <br><br>
        <div style="text-align:center;">
            <h4>Banner</h4>
            @if($evento->banner == '' or is_null($evento->banner))
                <td style="text-align:center"><img src="/images/ND.gif" style="width:100%"></td>
            @else
                <td style="text-align:center"><img src="/images/afiProx/{{ $evento->banner }}" style="width:100%"></td>
            @endif
        </div>
    </div>  
</div>
@endsection
