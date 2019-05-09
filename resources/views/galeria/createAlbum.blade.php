@extends('template.main')

@section('title','Galería - Crear Album')
@section('content')
<div class="container">
    <h1 class="page-header">Crear Album</h1>
    @if($errors->has(''))
        <div class="alert alert-block alert-error fade in"id="error-block">
            <?php $messages = $errors->all('<li>:message</li>');?>
            <button type="button" class="close"data-dismiss="alert">×</button>
            <h4>Warning!</h4>
            <ul>
                @foreach($messages as $message)
                    {{$message}}
                @endforeach
            </ul>
        </div>
    @endif
    
    {!! Form::open(['route' => 'galeria.store', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('name','Nombre del Album', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre del Album' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description','Descripción del Album', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Descripción del Album' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('','', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {{Form::file('cover_image', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione una imagen de Portada'])}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Crear Album', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection