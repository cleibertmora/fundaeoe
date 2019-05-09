@extends('template.main')

@section('title','Galería')
@section('content')
<section id="portfolio">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ÁLBUMES</h2>
            <p class="text-center wow fadeInDown">
                Puedes ver nuestras fotos de los eventos<br> aquí en esta sección.
            </p>
            @if (!Auth::guest())
                @if (Auth::user()->admin())
                    <p class="text-center">
                        <a href="{{ route('galeria.create') }}" class="btn btn-primary">Crear Nuevo Album</a>
                    </p>
                @endif
            @endif
        </div>
        <div class="row">
            @foreach($albums as $album)
            <div class="col-sm-6 col-md-4 wow fadeInUp">
                <div class="thumbnail">
                    <img src="/images/albums/{{$album->cover_image}}">
                    <div class="caption">
                        <h3 align="center">{{$album->name}}</h3>
                        <p>{{$album->description}}</p>
                        <p>{{count($album->PPhotos)}} imagen(es).
                        @if (!Auth::guest())
                            {{count($album->Photos) - count($album->PPhotos) }} imagen(es) por publicar.</p>
                        @endif
                        <p>Fecha de creación: {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                        <p align="center"><a href="{{ route('galeria.album', array('id'=>$album->id))}}" class="btn btn-primary" role="button">Ver Álbum</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {!! $albums->render() !!}
    </div><!--/.container-->
</section>
@endsection