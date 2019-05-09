@extends('template.main')

@section('title', 'Lista de Tickets')

@section('content')

<div class="container">
    
	{{-- @include('admin.certificate.partials.info') --}}

    <h1 class=page-header id=glyphicons>Listado de Tickets para la rifa: {{ $rifa->nombre }}<a href="{{ route('tickets.create', 'rifa=' . $rifa->id) }}" class="btn btn-primary pull-right">Nuevo Ticket</a></h1>
	
	{!! Form::open(['route' => 'tickets.list', 'method' => 'GET', 'class' => 'form-inline navbar-form pull-right']) !!}

        <div class="form-group"> 
			
			{!! Form::hidden('rifa', $rifa->id) !!}

            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Nro. de Control o Documento', 'aria-describedby' => 'search']) !!}

            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden='true'></span></button>   

        </div>

    {!! Form::close() !!}

	<table class="table table-striped text-center">

		<thead>

			<th width="15%" style="text-align: center">Número de Control</th>

			<th width="10%" style="text-align: center">Colaborador</th>

			<th width="15%" style="text-align: center">A Nombre</th>

            <th width="15%" style="text-align: center">Contacto</th>
            
            <th width="15%" style="text-align: center">Dirección</th>

			<th width="10%" style="text-align: center">Institución</th>

			<th width="20%" style="text-align: center">Acciones</th>

		</thead>

		<tbody>

			@foreach($tickets as $ticket)

				<tr>
					<td>{{ $ticket->num_control }}</td>
					<td>{{ $ticket->primerNombre }} {{ $ticket->primerApellido }}</td>
					<td><b>{{ $ticket->nombre }} {{ $ticket->apellido }}</b> <br> <span class="label label-primary">{{ $ticket->tipo }}: {{ $ticket->documento }}</span></td>
					<td>{{ $ticket->correo }} <br> <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> {{ $ticket->telefono }} </td>
					<td>{{ $ticket->direccion }}</td>
					<td>{{ $ticket->institucion }}</td>
				<td>

					<a target="_blank" href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
				
					@if(Auth::user()->id == $ticket->usuario_registra || Auth::user()->type == 'admin' )
					
						<a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					
						{!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'DELETE']) !!}
							<button class="btn btn-sm btn-danger" onClick="return confirm('Seguro que deseas eliminarlo?')">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>                           
						{!! Form::close() !!}

					@endif
				
				</td>
				</tr>

			@endforeach

		</tbody>

	</table>

	{{-- $tickets->links() --}}

</div>	

@endsection