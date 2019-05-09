{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {!! Form::label('nombre','Nombre de Rifa:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'required', 'placeholder' => 'Nombre de Rifa']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('pais','País donde se realizará:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('pais', null, ['class' => 'form-control', 'id' => 'pais', 'required', 'placeholder' => 'País']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('ciudad','Ciudad donde se realizará:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('ciudad', null, ['class' => 'form-control', 'id' => 'usuario', 'required', 'placeholder' => 'Ciudad']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('descripcion','Descripcion de la Rifa:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-8">
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción de la Rifa:', 'rows' => '3']) !!}
</div>
</div>

<div class="form-group">
    {!! Form::label('fecha_in','Fecha de inicio:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-8">
<div class='input-group date' id='fecha_in'>
{!! Form::text('fecha_in', date_format(date_create(isset($rifa->fecha_in) ? $rifa->fecha_in : ''), 'd-m-Y'), ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}

    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>
</div>
</div>
</div>

<div class="form-group">
    {!! Form::label('fecha_fin','Fecha de Fin:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-8">
<div class='input-group date' id='fecha_fin'>
{!! Form::text('fecha_fin', date_format(date_create(isset($rifa->fecha_fin) ? $rifa->fecha_fin : ''), 'd-m-Y'), ['class' => 'form-control', 'required', 'placeholder' => 'DD/MM/AAAA' ]) !!}

    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>
</div>
</div>
</div>

<div class="form-group">
    
        {!! Form::label('moneda','Moneda:', ['class' => 'col-sm-2 control-label']) !!}
        
        <div class="col-sm-8">
            {!! Form::select('moneda', [
                                        'USD' => 'USD',
                                        'EUR' => 'EUR',
                                        'COP' => 'COP',
                                        'CLP' => 'CLP',
                                        'PEN' => 'PEN',
                                        'DOP' => 'DOP ',
                                        'ARS' => 'ARS',
                                    ], null, ['class' => 'form-control', 'required' ]) !!}
        </div>
    </div>

<div class="form-group">
    {!! Form::label('valor_ticket','Valor por ticket:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('valor_ticket', null, ['class' => 'form-control', 'id' => 'valor_ticket', 'required', 'placeholder' => '10.00']) !!}
    </div>
</div>

<div class="form-group">
  
   {!! Form::label('colaboradores','Colaboradores Activos:', ['class' => 'col-sm-2 control-label']) !!}
  
   @foreach($users as $user)
  
   <label class="control-label">
   
       {!! Form::checkbox('users[]', $user->id) !!} {!! $user->fullName !!} , {!! $user->tipoDocumento !!}-{!! $user->documento !!}
   
   </label><br>

    @endforeach

  
</div>

<div class="form-group">
    
    {!! Form::label('status','Estado de la Rifa:', ['class' => 'col-sm-2 control-label']) !!}
    
    <div class="col-sm-8">
        {!! Form::select('status', ['activo' => 'Activo', 'inactivo' => 'Inactivo'], null, ['class' => 'form-control', 'required' ]) !!}
    </div>
</div>

<hr>

<div class="alert alert-info" role="alert">Los siguientes campos se verán reflejados en cada ticket que generé el sistema, la cláusula es la regla o conjunto de reglas para participar, por ejemplo “Ticket único e intransferible”, Mientras que el campo para premios es para detallar los premios de la rifa. </div>

<div class="form-group">
    {!! Form::label('clausula','Cláusula de la Rifa:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-8">
    {!! Form::textarea('clausula', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
</div>

<div class="form-group">
    {!! Form::label('premio','Premio(s) de la Rifa:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-8">
    {!! Form::textarea('premio', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
</div>