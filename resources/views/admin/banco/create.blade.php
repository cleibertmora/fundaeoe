@extends('template.main')

@section('title', 'Crear Banco')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Crear Banco</h1>
	{!! Form::open(['route' => 'banco.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
	<div class="form-group">
		{!! Form::label('descripcion','Descripción:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('descripcion', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del Banco']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('cuentano','Número de Cuenta:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('cuentano', null, ['class' => 'form-control', 'required', 'placeholder' => 'No. de Cuenta' ]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('rif','R.I.F.:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('rif', null, ['class' => 'form-control', 'placeholder' => 'R.I.F.' ]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('emoresa','Empresa:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('empresa', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la Empresa' ]) !!}
		</div>
	</div>
    <div class="form-group">
        <label for="pais" class="col-md-2 control-label">País:</label>
        <div class="col-md-4">
            {!! Form::select('pais', ['VE' => 'Venezuela', 'CO' => 'Colombia'], null, ['class' => 'form-control', 'required' ]) !!}
        </div>
    </div>
	<div class="form-group">
		{!! Form::label('logo','Logo:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('logo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('recibo','Recibo Banco:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('recibo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Crear Banco', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection