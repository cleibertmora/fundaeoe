@extends('template.main')



@section('title', 'Lista de Certificados')

@section('content')

<div class="container">
    
	@include('admin.certificate.partials.info')

	<h1 class=page-header id=glyphicons>Certificados</h1>

	<a href="{{ route('certificados.create') }}" class="btn btn-info">Subir Nuevo Certificado</a>

    {!! Form::open(['route' => 'certificado.index', 'method' => 'GET', 'class' => 'form-inline navbar-form pull-right']) !!}

        <div class="form-group">         

            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Cédula de Usuario', 'aria-describedby' => 'search']) !!}

            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden='true'></span></button>   

        </div>

    {!! Form::close() !!}

    <hr>

	<table class="table table-striped text-center">

		<thead>

			<th width="25%" style="text-align: center">Nombre de Usuario</th>

			<th width="25%" style="text-align: center">Evento</th>

			<th width="25%" style="text-align: center">Nota</th>

			<th width="10%" style="text-align: center">Fecha</th>

			<th width="15%" style="text-align: center">Acciones</th>

		</thead>

		<tbody>

		@foreach($certificates as $certificate)

				<tr>

					<td style="text-align:left">
						{{ $certificate->fullName }}
						<br><span class="label label-info"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ $certificate->documento }}</span>
					</td>

					<td style="vertical-align:middle">{{ $certificate->titulo }}</td>

					<td style="vertical-align:middle">{{ $certificate->nota }}</td>

					<td style="vertical-align:middle">{{ $certificate->fecha }}</td>

					<td style="vertical-align:middle">

						<a href="/certificados/{{ $certificate->path }}" target="_blank" class="btn btn-primary">

                            <span class="glyphicon glyphicon-search" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span></a>

                        <a href="{{ route('certificados.edit', $certificate->id) }}" class="btn btn-warning">

                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>

                        </a>

                        <a href="{{ route('certificates.destroy', $certificate->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">

                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>

                        </a>

					</td>

				</tr>

			@endforeach

		</tbody>

	</table>

	{!! $certificates->render() !!}

</div>	

@endsection