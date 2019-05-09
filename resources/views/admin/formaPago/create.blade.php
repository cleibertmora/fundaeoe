@extends('template.main')

@section('title', 'Crear Forma de Pago')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Crear Forma de Pago</h1>
    {!! Form::open(['route' => 'formaPago.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('forma','Forma de Pago', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('forma', null, ['class' => 'form-control', 'placeholder' => 'V', 'required' ]) !!}
        </div>
        {!! Form::label('adicional','Adicional', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('adicional', null, ['class' => 'form-control', 'placeholder' => 'No. de Documento
            ', 'required' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('tipo','Tipo', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Crear Forma de Pago', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection