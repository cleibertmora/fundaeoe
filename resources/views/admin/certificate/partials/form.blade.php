
<div id="alert-no-exists" class="form-group" hidden>
    <p for="" class="alert alert-danger center"><b>La cédula que ingreso no esta registrada, por favor prueba nuevamente</b></p>
</div>

<div class="form-group">
        {!! Form::label('titulo','Evento:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('evento_id', $eventos, null, ['class' => 'form-control', 'required', 'placeholder' => 'Certificado Para Evento']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('numero_cedula','Cédula:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('cedula', null, ['class' => 'form-control', 'id' => 'cedula', 'required', 'placeholder' => 'Nro. de Cédula del usuario' ]) !!}
    </div>
</div>

{{ Form::hidden('iduser', null, array('id' => 'invisible_id')) }}

<div class="form-group">
    {!! Form::label('usuario','Usuario:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('usuario', null, ['class' => 'form-control', 'id' => 'usuario', 'required', 'placeholder' => 'Nombre de usuario', 'disabled' ]) !!}
    </div>
</div>

<div class="form-group">
            {!! Form::label('fecha','Fecha:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        <div class='input-group date' id='fecha'>
        {!! Form::text('fecha', date_format(date_create(isset($certificate->fecha) ? $certificate->fecha : ''), 'd-m-Y'), ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}

            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
</div>

<div class="form-group">
        {!! Form::label('nota','Nota:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('nota', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', ]) !!}
    </div>
</div>

<div class="form-group">
        {!! Form::label('certificado','Archivo:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::file('certificado',['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo', 'required']) !!}
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-offset-2 col-sm-10">
        
        @if (\Route::current()->getName() == 'certificados.edit')
           <a class="btn btn-success" href="/certificados/{{ $certificate->path }}" target="_blank">Ver Certificado Anterior</a>
        @endif 
        
        {!! Form::submit('Subir Certificado', ['class' => 'btn btn-primary']) !!}
    </div>
</div>