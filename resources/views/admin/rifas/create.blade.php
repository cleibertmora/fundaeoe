@extends('template.main')

@section('title', 'Crear nueva rifa')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Nueva Rifa <a href="{{ route('rifas.index') }}" class="btn btn-info pull-right"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Regresar</a></h1>
	    
    {!! Form::open(['route' => 'rifas.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
	
		@include('admin.rifas.inc.form')

        <div class="form-group">
            <p align="center">{!! Form::submit('Guardar Rifa', ['class' => 'btn btn-primary']) !!}</p>
        </div>

	{!! Form::close() !!}

</div>

@endsection

@section('custom_js')

    <script src="/plugins/moment/moment.js"></script>
    <script src="/plugins/bootstrap/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

    <script>
    
    $('#fecha_in').datetimepicker({format: 'DD/MM/YYYY'});

    $('#fecha_fin').datetimepicker({format: 'DD/MM/YYYY'});
    
    </script>

@endsection