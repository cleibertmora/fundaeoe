@extends('template.main')

@section('title', 'Lista de Instituciones')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Instituciones</h1>
	<a href="{{ route('instituto.create') }}" class="btn btn-info">Registrar Nueva Institución</a>
    {!! Form::open(['route' => 'instituto.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Institución...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
	<table class="table table-striped">
		<thead>
			<th width="10%"></th>
			<th width="40%">Descripción</th>
			<th width="40%">Página WEB</th>
			<th width="10%"></th>
		</thead>
		<tbody>
			@foreach($instituciones as $instituto)
				<tr>
                    @if($instituto->logo == '' or is_null($instituto->logo))
                        <td style="text-align:center"><img src="/images/ND.gif" style="height:36px"></td>
                    @else
                        <td style="text-align:center"><img src="/images/logos/{{ $instituto->logo }}" style="height:36px"></td>
                    @endif
					<td style="vertical-align:middle">{{ $instituto->descripcion }}</td>
					<td style="vertical-align:middle">{{ $instituto->web }}</td>
					<td style="vertical-align:middle">
                        <a href="{{ route('instituto.edit', $instituto->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('instituto.destroy', $instituto->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $instituciones->render() !!}
</div>
@endsection