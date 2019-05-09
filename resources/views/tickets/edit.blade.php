@extends('template.main')

@section('title', 'Editar ticket')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Editar Ticket <a href="{{ route('tickets.list', 'rifa=' . $ticket->rifa_id) }}" class="btn btn-info pull-right"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Regresar</a></h1>
        
    @if(session()->has('data'))

       <div class="alert alert-success" role="alert">{{ session('data') }}</div>

    @endif

    {!! Form::model($ticket, ['route' => ['tickets.update', $ticket->id], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
	
		@include('tickets.inc.form')

        <div class="form-group">
            <p align="center">{!! Form::submit('Actualizar Ticket', ['class' => 'btn btn-warning']) !!}</p>
        </div>

	{!! Form::close() !!}

</div>

@endsection