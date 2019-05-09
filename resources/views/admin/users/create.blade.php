@extends('template.main')



@section('title', 'Crear Usuario')

@section('content')

<div class="container">

	<h1 class=page-header id=glyphicons>Crear Usuarios</h1>

	{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}



    <div class="form-group">

        <label for="pais" class="col-md-2 control-label">País:</label>

        <div class="col-md-4">

            {!! Form::select('pais', [

               'AR' => 'Argentina',

               'BO' => 'Bolivia',

               'CL' => 'Chile',

               'CO' => 'Colombia',

               'CR' => 'Costa Rica',

               'CU' => 'Cuba',

               'EC' => 'Ecuador',

               'SV' => 'El Salvador',

               'ES' => 'España',

               'GT' => 'Guatemala',

               'GQ' => 'Guinea Ecuatorial',

               'HN' => 'Honduras',

               'MX' => 'México',

               'NI' => 'Nicaragua',

               'PA' => 'Panamá',

               'PY' => 'Paraguay',

               'PE' => 'Perú',

               'RD' => 'República Dominicana',

               'UR' => 'Uruguay',

               'VE' => 'Venezuela',

            ], null, ['class' => 'form-control', 'required' ]) !!}

        </div>

    </div>



    <div class="form-group">

        {!! Form::hidden('tipoDocumento', 'V') !!}

        {!! Form::label('Documento','Documento:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-4">

			{!! Form::text('documento', null, ['class' => 'form-control', 'placeholder' => 'No. de Documento', 'required' ]) !!}

		</div>

		{!! Form::label('type','Tipo de Usuario:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-4">

			{!! Form::select('type', ['usuario' => 'Usuario', 'admin' => 'Administrador', 'colaborador' => 'Colaborador'], null, ['class' => 'form-control', 'required' ]) !!}

		</div>

	</div>



    <div class="form-group">

        <label for="password" class="col-md-2 control-label">Contraseña:</label>

        <div class="col-md-4">

            {!! Form::text('contrasena', null, ['class' => 'form-control', 'required' ]) !!}

        </div>

    </div>



	<div class="divider"></div>



	<div class="form-group">

		{!! Form::label('primerNombre','Primer Nombre:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-4">

			{!! Form::text('primerNombre', null, ['class' => 'form-control', 'placeholder' => 'Primer Nombre', 'required' ]) !!}

		</div>

		{!! Form::label('segundoNombre','Segundo Nombre:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-4">

			{!! Form::text('segundoNombre', null, ['class' => 'form-control', 'placeholder' => 'Segundo Nombre' ]) !!}

		</div>

	</div>

	<div class="form-group">

		{!! Form::label('primerApellido','Primer Apellido:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-4">

			{!! Form::text('primerApellido', null, ['class' => 'form-control', 'placeholder' => 'Primer Apellido', 'required' ]) !!}

		</div>

		{!! Form::label('segundoApellido','Segundo Apellido:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-4">

			{!! Form::text('segundoApellido', null, ['class' => 'form-control', 'placeholder' => 'Segundo Apellido']) !!}

		</div>

	</div>

	<div class="form-group">

        <label for="fechaNacimiento" class="col-md-2 control-label">Fecha de Nacimiento:</label>

        <div class="col-md-2">

             <div class='input-group date' id='fechaNacimiento'>

                {!! Form::text('fechaNacimiento', null, ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}

                <span class="input-group-addon">

                    <span class="glyphicon glyphicon-calendar"></span>

                </span>

            </div>

        </div>

        <div class="control-group">

            <label for="email" class="col-md-2 control-label">Correo Electrónico:</label>

            <div class="controls">

                <div class="col-md-6">

                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'data-validation-required-message' => 'Campo Requerido', 'data-validation-email-message' => 'Correo NO Valido', 'required' ]) !!}

                    <span class="help-block"></span>

                </div>

            </div>

        </div>

	</div>

	<div class="form-group">

		{!! Form::label('sexo','Sexo:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-2">

			{!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'form-control', 'required' ]) !!}

		</div>

		{!! Form::label('telefonoPrincipal','Teléfono Prinicpal:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-2">

			{!! Form::text('telefonoPrincipal', null, ['class' => 'form-control', 'placeholder' => '0414-9999999', 'required']) !!}

		</div>

		{!! Form::label('telefonoCelular','Teléfono Celular:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-2">

			{!! Form::text('telefonoCelular', null, ['class' => 'form-control', 'placeholder' => '0299-9999999', 'required']) !!}	

		</div>	

	</div>

	<div class="form-group">

		{!! Form::label('instituto_id','Instituto:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-10">

			{!! Form::select('instituto_id', $institutos, null, ['class' => 'form-control', 'required' ]) !!}

		</div>

	</div>



	<div class="divider"></div>



	<div class="form-group">

		{!! Form::label('condicion','Condición:', ['class' => 'col-sm-2 control-label']) !!}

		<div class="col-sm-1">

			{!! Form::text('condicion', null, ['class' => 'form-control', 'required' ]) !!}

		</div>

		{!! Form::label('sms','SMS:', ['class' => 'col-sm-1 control-label']) !!}

		<div class="col-sm-1">

			{!! Form::text('sms', null, ['class' => 'form-control', 'required' ]) !!}

		</div>

		{!! Form::label('sCorreo','sCorreo:', ['class' => 'col-sm-1 control-label']) !!}

		<div class="col-sm-1">

			{!! Form::text('sCorreo', null, ['class' => 'form-control', 'required' ]) !!}

		</div>

		{!! Form::label('saldo','Saldo:', ['class' => 'col-sm-3 control-label']) !!}

		<div class="col-sm-2">

			{!! Form::text('saldo', null, ['class' => 'form-control', 'placeholder' => 'Saldo', 'required' ]) !!}

		</div>

	</div>

	<br><br>

	<div class="form-group">

		<div class="col-sm-offset-2 col-sm-10">

			{!! Form::submit('Crear Usuario', ['class' => 'btn btn-primary']) !!}

		</div>

	</div>

	{!! Form::close() !!}

</div>

@endsection

