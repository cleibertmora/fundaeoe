@extends('template.main')

@section('title', 'Editar Usuario')
@section('content')

@php ( $fecha = 1)

<div class="container">
    <h1 class=page-header id=glyphicons>Editar Usuarios</h1>
    {!! Form::open(['route' => ['users.updateU',$user], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}

    <div class="form-group">
        <label for="pais" class="col-md-2 control-label">País:</label>
        <div class="col-md-4">
            {!! Form::select('pais', [
                'CO' => 'Colombia',
                'AR' => 'Argentina',
                'BO' => 'Bolivia',
                'CL' => 'Chile',
                'CR' => 'Costa Rica',
                'CU' => 'Cuba',
                'EC' => 'Ecuador',
                'SV' => 'El Salvador',
                'ES' => 'Espa�a',
                'GT' => 'Guatemala',
                'GQ' => 'Guinea Ecuatorial',
                'HN' => 'Honduras',
                'MX' => 'Mexico',
                'NI' => 'Nicaragua',
                'PA' => 'Panama',
                'PY' => 'Paraguay',
                'PE' => 'Perú',
                'RD' => 'República Dominicana',
                'UR' => 'Uruguay', 
                'VE' => 'Venezuela', 
            ], $user->pais, ['class' => 'form-control', 'required' ]) !!}
        </div>
        {!! Form::hidden('tipoDocumento', 'V') !!}
        {!! Form::label('Documento','Documento:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('documento', $user->documento, ['class' => 'form-control', 'placeholder' => 'No. de Documento', 'disabled' ]) !!}
        </div>
    </div>

    <div class="divider"></div>

    <div class="form-group">
        {!! Form::label('primerNombre','Primer Nombre:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('primerNombre', $user->primerNombre, ['class' => 'form-control', 'placeholder' => 'Primer Nombre', 'required' ]) !!}
        </div>
        {!! Form::label('segundoNombre','Segundo Nombre:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('segundoNombre', $user->segundoNombre, ['class' => 'form-control', 'placeholder' => 'Segundo Nombre']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('primerApellido','Primer Apellido:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('primerApellido', $user->primerApellido, ['class' => 'form-control', 'placeholder' => 'Primer Apellido', 'required' ]) !!}
        </div>
        {!! Form::label('segundoApellido','Segundo Apellido:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('segundoApellido', $user->segundoApellido, ['class' => 'form-control', 'placeholder' => 'Segundo Apellido']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="fechaNacimiento" class="col-md-2 control-label">Fecha de Nacimiento:</label>
        <div class="col-md-2">
             <div class='input-group date' id='fechaNacimiento'>
                {!! Form::text('fechaNacimiento', date_format(date_create($user->fechaNacimiento), 'd-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="control-group">
            <label for="email" class="col-md-2 control-label">Correo Electrónico:</label>
            <div class="controls">
                <div class="col-md-6">
                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'data-validation-required-message' => 'Campo Requerido', 'data-validation-email-message' => 'Correo NO Valido', 'disabled' ]) !!}
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('sexo','Sexo:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], $user->sexo, ['class' => 'form-control', 'required' ]) !!}
        </div>
        {!! Form::label('telefonoPrincipal','Teléfono Prinicpal:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('telefonoPrincipal', $user->telefonoPrincipal, ['class' => 'form-control', 'placeholder' => '0414-9999999'], 'required') !!}
        </div>
        {!! Form::label('telefonoCelular','Teléfono Celular:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('telefonoCelular', $user->telefonoCelular, ['class' => 'form-control', 'placeholder' => '0299-9999999'], 'required') !!} 
        </div>  
    </div>
    <div class="form-group">
        {!! Form::label('instituto_id','Instituto:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('instituto_id', $institutos, $user->instituto_id, ['class' => 'form-control', 'required' ]) !!}
        </div>
    </div>
    <br><br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Editar Usuario', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
