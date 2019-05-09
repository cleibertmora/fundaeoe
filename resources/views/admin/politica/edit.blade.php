@extends('template.main')

@section('title', 'Editar Politica')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Editar Politica</h1>
    {!! Form::open(['route' => ['politica.update',$politica], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('detalles','Detalles:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('detalles', $politica->detalles, ['class' => 'form-control', 'required', 'id' => 'mytextarea' ]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Editar Politica', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection