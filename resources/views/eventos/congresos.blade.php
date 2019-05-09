@extends('template.main')

@section('title','Eventos - Congresos')
@section('content')
<section id="blog">
   <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Nuestros Congresos</h2>
            <p class="text-center wow fadeInDown">Nuestras conferencias hacen que los miembros de un cuerpo o especialización, lleven a cabo en forma periódica, para así debatir diversos temas inherentes al quehacer en nuestra área del saber.
            </p>
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#porIniciar">Por Iniciar</a></li>
            <li><a data-toggle="tab" href="#finalizados">Finalizados</a></li>
        </ul>

        <div class="tab-content">
            <div id="porIniciar" class="tab-pane fade in active">
                @foreach($eventosA as $evento)
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                            <article class="media clearfix">
                                <div class="pull-left">
                                    <img width="172" class="img-responsive" src="
                                    @if(is_null($evento->afiche) || $evento->afiche == '')
                                        /images/afiProx/ND.gif
                                    @else
                                        /images/afiProx/{{ $evento->afiche }}
                                    @endif
                                    " alt=""> 
                                </div>
                                <div class="media-body">
                                    <header class="entry-header">
                                        <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.evento', array('id' => $evento->id)) }}">{!! $evento->titulo !!}</a></h2>
                                    </header>
                                    <div class="entry-content" align="center">
                                        <P>{{ $evento->direccion }}</P>
                                        @if(($evento->fechaI == $evento->fechaF))
                                            <P>EL {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaI)->format('d-m-Y') }} </P>
                                        @else
                                            <P>DESDE EL {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaI)->format('d-m-Y') }} HASTA EL {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaF)->format('d-m-Y') }}</P>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="{{ route('eventos.evento', array('id' => $evento->id)) }}">Ver Evento</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                @endforeach
                {!! $eventosA->render() !!}
            </div>
            <div id="finalizados" class="tab-pane fade">
                @foreach($eventosF as $evento)
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                            <article class="media clearfix">
                                <div class="pull-left">
                                    <img width="172" class="img-responsive" src="
                                    @if(is_null($evento->afiche) || $evento->afiche == '')
                                        /images/afiProx/SinAfiche.jpg
                                    @else
                                        /images/afiProx/{{ $evento->afiche }}
                                    @endif
                                    " alt=""> 
                                </div>
                                <div class="media-body">
                                    <header class="entry-header">
                                        <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.evento', array('id' => $evento->id)) }}">{!! $evento->titulo !!}</a></h2>
                                    </header>
                                    <div class="entry-content" align="center">
                                        <P>{{ $evento->direccion }}</P>
                                        @if(($evento->fechaI == $evento->fechaF))
                                            <P>EL {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaI)->format('d-m-Y') }} </P>
                                        @else
                                            <P>DESDE EL {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaI)->format('d-m-Y') }} HASTA EL {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaF)->format('d-m-Y') }}</P>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="{{ route('eventos.evento', array('id' => $evento->id)) }}">Ver Evento</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                @endforeach
                {!! $eventosF->render() !!}
            </div>
        </div>
   </div>
</section>
@endsection