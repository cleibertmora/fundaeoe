@if (\Route::current()->getName() == 'tickets.edit')
    {{ Form::hidden('rifa_id', $ticket->rifa_id) }}
    {{ Form::hidden('user_id', $ticket->user_registra) }}
@else
    {{ Form::hidden('user_id', auth()->user()->id) }}    
    {{ Form::hidden('rifa_id', $rifa_id) }}
@endif 

<div class="form-group">
    {!! Form::label('nombre','Nombre:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('apellido','Apellido:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('apellido', null, ['class' => 'form-control', 'id' => 'apellido', 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefono','Teléfono:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::number('telefono', null, ['class' => 'form-control', 'id' => 'telefono', 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('correo','Correo:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-8">
    {!! Form::email('correo', null, ['class' => 'form-control', 'required']) !!}
</div>
</div>

<div class="form-group">
    {!! Form::label('direccion','Dirección:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('institucion','Institución:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('institucion', null, ['class' => 'form-control', 'id' => 'institucion']) !!}
    </div>
</div>

<div class="form-group">
    
    {!! Form::label('tipo','Tipo de Documento:', ['class' => 'col-sm-2 control-label']) !!}
    
    <div class="col-sm-8">
        {!! Form::select('tipo', ['cedula' => 'Cédula', 'pasaporte' => 'Pasaporte'], null, ['class' => 'form-control', 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('documento','N° Documento:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('documento', null, ['class' => 'form-control', 'id' => 'documentos', 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('comentario','Comentario (opcional):', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('comentario', null, ['class' => 'form-control', 'id' => 'comentario', 'rows' => '3']) !!}
    </div>
</div>