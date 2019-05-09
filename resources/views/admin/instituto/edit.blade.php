@extends('template.main')

@section('title', 'Editar Institución')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Editar Institución</h1>
	<div class="col-sm-10">
		{!! Form::open(['route' => ['instituto.update', $institucion], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
		<div class="form-group">
			{!! Form::label('descripcion','Descripción:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('descripcion', $institucion->descripcion, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la Institución' ]) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('web','Página Web:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('web', $institucion->web, ['class' => 'form-control', 'placeholder' => 'www.ejemplo.com' ]) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('logo','Logo:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::file('logo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Editar Institución', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
		{!! Form::close() !!}
		</div>
    <div class="col-sm-2">
        @if($institucion->logo == '' or is_null($institucion->logo))
            <td style="text-align:center"><img src="/images/ND.gif" style="width:100%"></td>
        @else
            <td style="text-align:center"><img src="/images/logos/{{ $institucion->logo }}" style="width:100%"></td>
        @endif
    </div>	
</div>
@endsection