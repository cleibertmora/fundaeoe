@extends('template.main')

@section('title', 'Reporte de Rifas')

@section('content')

<div class="container">
    
	{{-- @include('admin.certificate.partials.info') --}}

    <h1 class=page-header id=glyphicons>Reporte de Rifas</h1>
	
	{!! Form::open(['route' => 'rifas.reporte', 'method' => 'GET', 'class' => 'form-inline navbar-form']) !!}

        <div class="form-group"> 
		
            {!! Form::select('rifa', $rifas, null, ['class' => 'form-control', 'placeholder' => 'Filtrar por Rifa']) !!}

            {!! Form::select('colaborador', $users, null, ['class' => 'form-control', 'placeholder' => 'Filtrar por Colaborador']) !!}

            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden='true'></span></button>   

        </div>

    {!! Form::close() !!}

	<table class="table table-striped text-center">

		<thead>

            <th width="15%" style="text-align: center">Número de Control</th>
            
            <th width="20%" style="text-align: center">Colaborador</th>

			<th width="15%" style="text-align: center">Participante</th>

            <th width="10%" style="text-align: center">País</th>
            
            <th width="10%" style="text-align: center">Ciudad</th>

            <th width="15%" style="text-align: center">Fecha de Creación</th>

            <th width="5%" style="text-align: center">Moneda</th>

			<th width="10%" style="text-align: center">Valor Ticket</th>

		</thead>

		<tbody>

			@foreach($tickets as $ticket)

				<tr>
                    <td>{{ $ticket->num_control }}</td>
                    <td>{{ $ticket->fullName }}</td>
					<td><b>{{ $ticket->nombre }} {{ $ticket->apellido }}</b> <br> <span class="label label-primary">{{ $ticket->tipo }}: {{ $ticket->documento }}</span></td>
					<td>{{ $ticket->pais }}</td>
                    <td>{{ $ticket->ciudad }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->moneda }}</td>
				    <td>{{ $ticket->valor_ticket }}</td>
				</tr>

            @endforeach
                
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"><b>FONDOS RECAUDADOS</b></td>
                <td><b>{{ $total_venta }}</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"><b>TOTAL RIFAS VENDIDAS</b></td>
                <td><b>{{ count($tickets) }}</b></td>
            </tr>

		</tbody>

	</table>

	{{-- $tickets->links() --}}

</div>	

@endsection