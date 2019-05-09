@extends('template.main')

@section('title','Registro')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Formulario de Registro</h2>
                    <blockquote>
                        <b>IMPORTANTE</b>: Estimado(a) Participante, este es el paso número uno (1) para el registro a eventos, usted deberá llenar el siguiente formulario con los datos necesarios para crear su cuenta, <b>este paso solo se hace una vez y no es necesario repetirlo si desea inscribirse a varios eventos a la vez</b>. Posterior al envío de la información solicitada en el siguiente formulario usted recibirá un mensaje de confirmación a su correo electrónico donde enviaremos el Usuario y Contraseña con el cual usted podra iniciar sesión y así proceder con la inscripción y registro de pagos para los eventos que usted desee. Si tiene alguna duda o sugerencia puede comunicarse con nosotros vía email a: info@fundaeoe.net o vía telefónica al: +58 414.748.25.03 / +58 416.979.48.42. Por favor lea detenidamente nuestras <a data-toggle="modal" data-target="#PyC">POLÍTICAS Y CONDICIONES</a> antes de continuar.
                    </blockquote>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

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
                            ], old('pais'), ['class' => 'form-control', 'required' ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cedula" class="col-md-2 control-label">Documento de Identidad:</label>
                        <div class="col-md-4">
                            <div class="row ">
                                {!! Form::hidden('tipoDocumento', 'V') !!}
                                <div class="col-md-12">
                                    {!! Form::text('documento', old('documento'), ['class' => 'form-control', 'placeholder' => 'No. de Documento', 'required autofocus' ]) !!}
                                </div>
                            </div>
                        </div>
                        <label for="instituto_id" class="col-md-2 control-label">Institución:</label>
                        <div class="col-sm-4">
                            {!! Form::select('instituto_id', $institutos, old('instituto_id'), ['class' => 'form-control', 'required' ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-group">
                            <label for="email" class="col-md-2 control-label">Correo Electrónico:</label>
                            <div class="controls">
                                <div class="col-md-4">
                                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'data-validation-required-message' => 'Campo Requerido', 'data-validation-email-message' => 'Correo NO Valido', 'required' ]) !!}
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="email_confirmation" class="col-md-2 control-label">Confirmar Correo:</label>
                                <div class="col-md-4">
                                    {!! Form::email('email_confirmation', old('email_confirmation'), ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'data-validation-required-message' => 'Campo Requerido', 'data-validation-email-message' => 'Correo NO Valido', 'data-validation-match-message' => 'Correo NO Coincide con inicial', 'data-validation-match-match' => 'email', 'required' ]) !!}
                                    <span class="help-block"></span>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="primerNombre" class="col-md-2 control-label">Primer Nombre:</label>
                        <div class="col-md-4">
                            {!! Form::text('primerNombre', old('primerNombre'), ['class' => "form-control", 'placeholder' => 'Primer Nombre', 'required' ]) !!}
                        </div>
                        <label for="segundoNombre" class="col-md-2 control-label">Segundo Nombre:</label>
                        <div class="col-md-4">
                            {!! Form::text('segundoNombre', old('segundoNombre'), ['class' => 'form-control', 'placeholder' => 'Segundo Nombre' ]) !!}
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="primerApellido" class="col-md-2 control-label">Primer Apellido:</label>
                        <div class="col-md-4">
                            {!! Form::text('primerApellido', old('primerApellido'), ['class' => "form-control", 'placeholder' => 'Primer Apellido', 'required' ]) !!}
                        </div>
                        <label for="segundoApellido" class="col-md-2 control-label">Segundo Apellido:</label>
                        <div class="col-md-4">
                            {!! Form::text('segundoApellido', old('segundoApellido'), ['class' => 'form-control', 'placeholder' => 'Segundo Apellido' ]) !!}
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="sexo" class="col-md-2 control-label">Sexo</label>
                        <div class="col-md-4">
                            {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], old('sexo'), ['class' => "form-control", 'required' ]) !!}
                        </div>
                        <label for="fechaNacimiento" class="col-md-2 control-label">Fecha de Nacimiento:</label>
                        <div class="col-md-4">
                             <div class='input-group date' id='fechaNacimiento'>
                                {!! Form::text('fechaNacimiento', old('fechaNacimiento'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="sexo" class="col-md-2 control-label">Teléfono Prinicpal:</label>
                        <div class="col-md-4">
                            {!! Form::text('telefonoPrincipal', old('telefonoPrincipal'), ['class' => "form-control", 'placeholder' => '0999-9999999','required' ]) !!}
                        </div>
                        <label for="fechaNacimiento" class="col-md-2 control-label">Teléfono Celular:</label>
                        <div class="col-md-4">
                            {!! Form::text('telefonoCelular', old('telefonoCelular'), ['class' => "form-control", 'placeholder' => '0499-9999999', 'required' ]) !!}
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="password" class="col-md-2 control-label">Contraseña:</label>
                        <div class="col-md-4">
                            {!! Form::password('password', ['class' => 'form-control', 'required' ]) !!}
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="password_confirmation" class="col-md-2 control-label">Confirmar Contraseña:</label>
                                <div class="col-md-4">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'data-validation-match-message' => 'Password NO Coincide con inicial', 'data-validation-match-match' => 'password', 'required' ]) !!}
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Registrarse
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="PyC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 1%">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Políticas y Condiciones</h4>
            </div>
            <div class="modal-body" style="line-height:16px;">
                <ol>
                    @foreach($politicas as $politica)
                        <li>{!! $politica !!}</li><br>
                    @endforeach
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
@endsection
