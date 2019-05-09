@extends('template.main')

@section('title','Eventos')
@section('content')
<section id="blog">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Nuestros eventos</h2>
            <p class="text-center wow fadeInDown">Acá tenemos el listado de todos los eventos que tenemos para ti.</p>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                    <article class="media clearfix">
                        <div class="entry-thumbnail pull-left">
                            <img class="img-responsive" src="images/congresos.jpg" alt="">
                            <span class="post-format post-format-gallery"><i class="fa fa-child"></i></span>
                        </div>
                        <div class="media-body">
                            <header class="entry-header">
                                <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.congresos') }}">Congresos</a></h2>
                            </header>

                            <div class="entry-content">
                                <P>Nuestras conferencias hacen que los miembros de un cuerpo o especialización, lleven a cabo en forma periódica, para así debatir diversos temas inherentes al quehacer en nuestra área del saber.</P>
                                <a class="btn btn-primary" href="{{ route('eventos.congresos') }}">Ver Todos</a>
                            </div>
                        
                        </div>
                    </article>
                </div>
                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="200ms">
                    <article class="media clearfix">
                        <div class="entry-thumbnail pull-left">
                            <img class="img-responsive" src="images/cursos.jpg" alt="">
                            <span class="post-format post-format-audio"><i class="fa fa-child"></i></span>
                        </div>
                        <div class="media-body">
                            <header class="entry-header">
                                <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.cursos') }}">Cursos</a></h2>
                            </header>

                            <div class="entry-content">
                                <P>El curso forma parte de la educación formal ya que está sistematizado en torno a un tema, a una proyección temporaria, al material que se utilizará, a las estrategias prácticas pensadas para cada temática, a un saber pre-existente también formalizado.</P>
                                <a class="btn btn-primary" href="{{ route('eventos.cursos') }}">Ver Todos</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                    <article class="media clearfix">
                        <div class="entry-thumbnail pull-left">
                            <img class="img-responsive" src="images/jornadas.jpg" alt="">
                            <span class="post-format post-format-gallery"><i class="fa fa-child"></i></span>
                        </div>
                        <div class="media-body">
                            <header class="entry-header">
                                <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.jornadas') }}">Jornadas</a></h2>
                            </header>

                            <div class="entry-content">
                                <P>Periodos de capacitaciones más cortas.</P><br/>
                                <a class="btn btn-primary" href="{{ route('eventos.jornadas') }}">Ver Todos</a>
                            </div>
                        
                        </div>
                    </article>
                </div>
                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="200ms">
                    <article class="media clearfix">
                        <div class="entry-thumbnail pull-left">
                            <img class="img-responsive" src="images/capacitaciones.jpg" alt="">
                            <span class="post-format post-format-audio"><i class="fa fa-child"></i></span>
                        </div>
                        <div class="media-body">
                            <header class="entry-header">
                                <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.capacitaciones') }}">Capacitaciones</a></h2>
                            </header>

                            <div class="entry-content">
                                <P>Formar, instruir, entrenar o educar. La capacitación busca que una persona adquiera capacidades o habilidades para el desarrollo de determinadas acciones.</P>
                                <a class="btn btn-primary" href="{{ route('eventos.capacitaciones') }}">Ver Todos</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                    <article class="media clearfix">
                        <div class="entry-thumbnail pull-left">
                            <img class="img-responsive" src="images/emprendimiento.jpg" alt="">
                            <span class="post-format post-format-gallery"><i class="fa fa-child"></i></span>
                        </div>
                        <div class="media-body">
                            <header class="entry-header">
                                <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.emprendimientos') }}">Emprendimiento</a></h2>
                            </header>

                            <div class="entry-content">
                                <P>Evolución de la nueva era, Comercio, Dinero, Internet, Personas, Proyección Motora de la realidad de la economía Mundial. Personas que se quieran Diversificar. </P>
                                <a class="btn btn-primary" href="{{ route('eventos.emprendimientos') }}">Ver Todos</a>
                            </div>
                        
                        </div>
                    </article>
                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                    <article class="media clearfix">
                        <div class="entry-thumbnail pull-left">
                            <img class="img-responsive" src="images/diplomados.jpg" alt="">
                            <span class="post-format post-format-gallery"><i class="fa fa-child"></i></span>
                        </div>
                        <div class="media-body">
                            <header class="entry-header">
                                <h2 class="entry-title" style="text-transform: uppercase;text-align: center;"><a href="{{ route('eventos.diplomados') }}">Diplomados</a></h2>
                            </header>

                            <div class="entry-content">
                                <P>Programa organizado en módulos que agrupan contenidos de una o varias disciplinas, complementando otras áreas en la actividad profesional. Tiene una duración aproximada de entre 100-120 horas.</P>
                                <a class="btn btn-primary" href="{{ route('eventos.diplomados') }}">Ver Todos</a>
                            </div>
                        
                        </div>
                    </article>
                </div>
                
            </div>
        </div>

    </div>
</section>
@endsection