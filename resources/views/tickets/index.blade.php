@extends('template.main')



@section('title', 'Lista de Rifas')

@section('content')

<div class="container">
    
	{{-- @include('admin.certificate.partials.info') --}}

	<h1 class=page-header id=glyphicons>Rifas</h1>

	<table class="table table-striped text-center">

		<thead>

			<th width="30%" style="text-align: center">Nombre</th>

			<th width="20%" style="text-align: center">País</th>

			<th width="20%" style="text-align: center">Ciudad</th>

			<th width="15%" style="text-align: center">Valor del Ticket</th>

			<th width="15%" style="text-align: center">Acciones</th>

		</thead>

		<tbody>

			@foreach($rifas as $rifa)

				<tr>
					<td>{{ $rifa->nombre }}</td>
					<td>{{ $rifa->pais }}</td>
					<td>{{ $rifa->ciudad }}</td>
					<td>{{ $rifa->valor_ticket }}</td>
					
					@if(Auth::user()->type == 'admin')

						<td><a href="{{ route('tickets.list', 'rifa=' . $rifa->id) }}" class="btn btn-primary">Ver Tickets</a></td>
				
					@else

						<td><a href="{{ route('tickets.list', 'rifa=' . $rifa->rifa_id) }}" class="btn btn-primary">Ver Tickets</a></td>
						
					@endif

				</tr>

			@endforeach

		</tbody>

	</table>

</div>	

@endsection