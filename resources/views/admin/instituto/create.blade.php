@extends('template.main')

@section('title', 'Crear Institución')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Crear Institución</h1>
	{!! Form::open(['route' => 'instituto.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
	<div class="form-group">
		{!! Form::label('descripcion','Descripción:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('descripcion', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la Institución']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('web','Página Web:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('web', null, ['class' => 'form-control', 'placeholder' => 'www.ejemplo.com' ]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('logo','Logo:', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('logo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Crear Institución', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection