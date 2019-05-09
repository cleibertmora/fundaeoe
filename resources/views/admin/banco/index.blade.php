@extends('template.main')

@section('title', 'Lista de Bancos')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Bancos</h1>
	<a href="{{ route('banco.create') }}" class="btn btn-info">Registrar Nuevo Banco</a>
    {!! Form::open(['route' => 'banco.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Banco...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
	<table class="table table-striped">
		<thead>
			<th width="20%"></th>
			<th width="40%">Descripción</th>
			<th width="30%">No. de Cuenta</th>
			<th width="10%"></th>
		</thead>
		<tbody>
			@foreach($bancos as $banco)
				<tr>
				    @if(is_null($banco->logo) || $banco->logo == '')
				    	<td style="text-align:center"><img src="/images/ND.gif" style="height:36px"></td>
				    @else
						<td style="text-align:center"><img src="/images/bancos/{{ $banco->logo }}" style="height:36px"></td>
					@endif
					<td style="vertical-align:middle">{{ $banco->descripcion }}</td>
					<td style="vertical-align:middle">{{ $banco->cuentano }}</td>
					<td style="vertical-align:middle">
                        <a href="{{ route('banco.edit', $banco->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('banco.destroy', $banco->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $bancos->render() !!}
</div>	
@endsection