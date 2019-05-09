@extends('template.main')

@section('title', 'Editar Banco')
@section('content')
<div class="container">
	<h1 class=page-header id=glyphicons>Editar Banco</h1>
	<div class="col-sm-10">
		{!! Form::open(['route' => ['banco.update', $banco], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
		<div class="form-group">
			{!! Form::label('descripcion','Descripción:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('descripcion', $banco->descripcion, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del Banco']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('cuentano','Número de Cuenta:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('cuentano', $banco->cuentano, ['class' => 'form-control', 'required', 'placeholder' => 'No. de Cuenta' ]) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('rif','R.I.F.;', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('rif', $banco->rif, ['class' => 'form-control', 'placeholder' => 'R.I.F.' ]) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('emoresa','Empresa:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('empresa', $banco->empresa, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la Empresa' ]) !!}
			</div>
		</div>
	    <div class="form-group">
	        <label for="pais" class="col-md-2 control-label">País:</label>
	        <div class="col-md-4">
	            {!! Form::select('pais', ['VE' => 'Venezuela', 'CO' => 'Colombia'], $banco->pais, ['class' => 'form-control', 'required' ]) !!}
	        </div>
	    </div>
		<div class="form-group">
			{!! Form::label('logo','Logo:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::file('logo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('recibo','Recibo Banco:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::file('recibo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Editar Banco', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
    <div class="col-sm-2">
        <div style="text-align:center;">
            <h4>Logo</h4>
            @if($banco->logo == '' or is_null($banco->logo))
                <td style="text-align:center"><img src="/images/ND.gif" style="width:100%"></td>
            @else
                <td style="text-align:center"><a href="/images/bancos/{{ $banco->logo }}" data-lightbox="banco" data-title="{{$banco->logo}}"><img src="/images/bancos/{{ $banco->logo }}" style="width:100%"></a></td>
            @endif
        </div>
        <br><br>
        <div style="text-align:center;">
        	<h4>Recibo</h4>
            @if($banco->recibo == '' or is_null($banco->recibo))
                <td style="text-align:center"><img src="/images/ND.gif" style="width:100%"></td>
            @else
                <td style="text-align:center"><a href="/images/bancos/{{ $banco->recibo }}" data-lightbox="banco" data-title="{{$banco->recibo}}"><img src="/images/bancos/{{ $banco->recibo }}" style="width:100%"></a></td>
            @endif
        </div>
    </div>	
</div>
@endsection