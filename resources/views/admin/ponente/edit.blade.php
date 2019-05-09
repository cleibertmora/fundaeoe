@extends('template.main')

@section('title', 'Editar Ponente')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Editar Ponente</h1>
    <div class="col-sm-10">
        {!! Form::open(['route' => ['ponente.update',$ponente], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('titulo','Título:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('titulo', $ponente->titulo, ['class' => 'form-control', 'placeholder' => 'Título, ej. Dr.' ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('nombre','Nombre:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('nombre', $ponente->nombre, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre(s) del Ponente']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('apellido','Apellido:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('apellido', $ponente->apellido, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido(s) del Ponente']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('pais','Pais:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('pais', $ponente->pais, ['class' => 'form-control', 'placeholder' => 'País de Residencia del Ponente']) !!}
                </div>
            </div>    
            <div class="form-group">
                {!! Form::label('curriculo','Curriculo:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::file('curriculo', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('foto','Foto:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::file('foto', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione un Archivo']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Editar Ponente', ['class' => 'btn btn-primary']) !!}
                </div>
            </div> 
        {!! Form::close() !!}
    </div>
    <div class="col-sm-2" style="text-align:center">
        <h4>Fotografía</h4>
        @if($ponente->foto == '' or is_null($ponente->foto))
            <td style="text-align:center"><img src="/images/ponentes/ND.png" style="height:150px; border-width:1px; border-color:black; border-style:solid;"><br><br></td>
        @else
            <td style="text-align:center"><img src="/images/ponentes/{{ $ponente->foto }}" style="height:150px; border-width:1px; border-color:black; border-style:solid;"><br><br></td>
        @endif
        <h4>Curriculum</h4>
        @if($ponente->curriculo == '' or is_null($ponente->curriculo))
            <td style="text-align:center"><img src="/images/ponentes/ND.gif" style="height:100px;"></td>
        @else
            <td style="text-align:center"><a class="btn btn-info" href="/images/ponentes/curriculums/{{ $ponente->curriculo }}" target="_blank">Ver CV</a></td>
        @endif
    </div>
</div>
@endsection