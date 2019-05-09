@extends('template.main')

@section('title', 'Crear Ponente')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Crear Ponente</h1>
    {!! Form::open(['route' => 'ponente.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}    <div class="form-group">
        {!! Form::label('titulo','Título:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Título, ej. Dr.' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nombre','Nombre:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre(s) del Ponente' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('apellido','Apellido:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido(s) del Ponente']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('pais','Pais:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('pais', null, ['class' => 'form-control', 'placeholder' => 'País de Residencia del Ponente' ]) !!}
        </div>
    </div>    
    <div class="form-group">
        {!! Form::label('curriculo','Curriculo:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('curriculo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('foto','Foto:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('foto', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Crear Ponente', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection