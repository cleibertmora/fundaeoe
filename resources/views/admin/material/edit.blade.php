@extends('template.main')

@section('title', 'Editar Material')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Editar Material</h1>
    <div class="col-sm-10">
        {!! Form::open(['route' => ['material.update',$material], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('descripcion','Descripción:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('descripcion', $material->descripcion, ['class' => 'form-control', 'required' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('logo','Logo:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::file('logo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Editar Material', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
        @if($material->logo == '' or is_null($material->logo))
            <td style="text-align:center"><img src="/images/ND.gif" style="width:100%"></td>
        @else
            <td style="text-align:center"><img src="/images/logos/{{ $material->logo }}" style="width:100%"></td>
        @endif    
    </div>
</div>
<br>
@endsection