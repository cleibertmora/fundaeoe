@extends('template.main')

@section('title','Galería - Agregar Imagen')
@section('content')
<div class="container">
    <h1 class="page-header">Agregar Imagen al Album: {{ $album->name }}</h1>
    @if($errors->has(''))
        <div class="alert alert-block alert-error fade in"id="error-block">
            <?php $messages = $errors->all('<li>:message</li>');?>
            <button type="button" class="close"data-dismiss="alert">×</button>
            <h4>Advertencia!</h4>
            <ul>
                @foreach($messages as $message)
                    {{$message}}
                @endforeach
            </ul>
        </div>
    @endif

    @if (!Auth::guest())
        @if (!Auth::user()->admin())
            <div class="alert alert-warning" role="alert">
                <strong>Información!</strong> Tome en cuenta que el Administrador deberá autorizar la publicación de la Fotografíe en el portal. La fotografía <strong>no aparecerá</strong> en el Album hasta no se autorice su publicación. 
            </div>
        @endif
    @endif
    
    {!! Form::open(['route' => 'galeria.storeImage', 'method' => 'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}
        {!! Form::hidden('album_id', $album->id) !!}
        <div class="form-group">
            {!! Form::label('description','Descripción de la Imágen', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Descripción' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('','', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {{Form::file('image', ['class' => 'filestyle', 'data-buttonText' =>'Seleccione una imagen'])}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Agregar Imagen', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection