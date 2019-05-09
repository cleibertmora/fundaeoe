@extends('template.main')

@section('title', 'Lista de Usuarios')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Usuarios</h1>
	<a href="{{ route('users.create') }}" class="btn btn-info">Registrar Nuevo Usuario</a>
	{!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Usuario...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
	<table class="table table-striped">
		<thead>
			<th width="10%">No. de documento</th>
			<th width="50%">Nombre</th>
			<th width="30%">Correo</th>
			<th width="20%"></th>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td style="vertical-align:middle">{{ $usuario->tipoDocumento . '-' . $usuario->documento }}</td>
					<td style="vertical-align:middle">{{ $usuario->fullName }}</td>
					<td style="vertical-align:middle">{{ $usuario->email }}</td>
					<td style="vertical-align:middle">
                        <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('users.destroy', $usuario->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $usuarios->render() !!}
</div>
@endsection