@extends('template.main')

@section('title', 'Editar Forma de Pago')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Editar Forma de Pago</h1>
    {!! Form::open(['route' => ['formaPago.update',$formaPago], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('forma','Forma de Pago', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('forma', $formaPago->forma, ['class' => 'form-control', 'placeholder' => 'V', 'required' ]) !!}
        </div>
        {!! Form::label('adicional','Adicional', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('adicional', $formaPago->adicional, ['class' => 'form-control', 'placeholder' => 'No. de Documento
            ', 'required' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('tipo','Tipo', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('tipo', $formaPago->tipo, ['class' => 'form-control'| ]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Editar Forma de Pago', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection