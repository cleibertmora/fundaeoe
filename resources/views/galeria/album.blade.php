@extends('template.main')

@section('title','Galería - Album')
@section('content')
<section id="portfolio">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title text-center wow fadeInDown">{{$album->name}}</h2>
            <p>{{$album->description}}<p>
            @if (!Auth::guest())
                <a href="{{route('galeria.createImage',array('id'=>$album->id))}}"><button type="button" class="btn btn-primary btn-large">Agregar nueva imagen al Album</button></a>
                @if (Auth::user()->admin())
                    <a href="{{route('galeria.deleteAlbum',array('id'=>$album->id))}}" onclick="return confirm('Esta seguro de Borra el Album?')"><button type="button" class="btn btn-danger btn-large">Borrar Album</button></a>
                @endif
            @endif
        </div>

        <div class="row wow fadeInDown text-center">
        @foreach($album->Photos as $photo)
            @if ($photo->publicar)
            <div class="col-md-4" style="padding: 12px">
                <a href="/images/albums/{{$photo->image}}" data-lightbox="galeria" data-title="{{$photo->description}}"><img src="/images/albums/{{$photo->image}}" alt="{{$album->name}}" class="img-responsive img-thumbnail"></a>
                @if (!Auth::guest())
                    @if (Auth::user()->admin())
                        {!! Form::open(['route' => ['foto.deleteImage',$photo->id], 'method' => 'GET']) !!}
                            <div class="">
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger', 'style' => 'position:absolute; z-index:1; top:30px; left:295px;']) !!}
                            </div>
                        {!! Form::close() !!}                            
                    @endif
                @endif
            </div>
            @else
                @if (!Auth::guest())
                    @if (Auth::user()->admin())
                        <div class="col-md-4" style="padding: 12px">
                            <a href="/images/albums/{{$photo->image}}" data-lightbox="galeria" data-title="{{$photo->description}}"><img src="/images/albums/{{$photo->image}}" alt="{{$album->name}}" class="img-responsive img-thumbnail"></a>
                            {!! Form::open(['route' => ['foto.publicar',$photo->id], 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::text('description', $photo->description, ['class' => 'form-control', 'placeholder' => 'Descripción' ]) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::submit('Publicar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => ['foto.deleteImage',$photo->id], 'method' => 'GET']) !!}
                                <div class="col-sm-6">
                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}                            
                        </div>            
                    @endif
                @endif
            @endif
        @endforeach
        </div>
    </div>
</section>
@endsection