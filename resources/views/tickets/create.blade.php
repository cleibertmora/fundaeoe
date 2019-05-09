@extends('template.main')

@section('title', 'Crear nuevo ticket')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Nuevo Ticket <a href="{{ route('tickets.list', 'rifa=' . $rifa_id) }}" class="btn btn-info pull-right"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Regresar</a></h1>
	    
    {!! Form::open(['route' => 'tickets.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
	
		@include('tickets.inc.form')

        <div class="form-group">
            <p align="center">{!! Form::submit('Guardar Ticket', ['class' => 'btn btn-primary']) !!}</p>
        </div>

	{!! Form::close() !!}

</div>

@endsection
