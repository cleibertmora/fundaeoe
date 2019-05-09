@extends('template.main')

@section('title','Home')
@section('content')
    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(images/slider/bg3.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>FUNDAEOE</span> Aprende más con nosotros</h2>
                                    <p>Eventos, Cursos, Congresos y Mucho Más.</p>
                                    <a class="btn btn-primary btn-lg" href="{{ route('eventos.index') }}">Todos Los Eventos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(images/slider/2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- div class="carousel-content">
                                    <h2><span>FUNDAEOE</span> Aprende más con nosotros</h2>
                                    <p>Eventos, Cursos, Congresos y Mucho Más.</p>
                                    <a class="btn btn-primary btn-lg" href="{{ route('eventos.index') }}">Todos Los Eventos</a>
                                </div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/3.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- div class="carousel-content">
                                    <h2><span>FUNDAEOE</span> Aprende más con nosotros</h2>
                                    <p>Eventos, Cursos, Congresos y Mucho Más.</p>
                                    <a class="btn btn-primary btn-lg" href="{{ route('eventos.index') }}">Todos Los Eventos</a>
                                </div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/4.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- div class="carousel-content">
                                    <h2><span>FUNDAEOE</span> Aprende más con nosotros</h2>
                                    <p>Eventos, Cursos, Congresos y Mucho Más.</p>
                                    <a class="btn btn-primary btn-lg" href="{{ route('eventos.index') }}">Todos Los Eventos</a>
                                </div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/5.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- div class="carousel-content">
                                    <h2><span>FUNDAEOE</span> Aprende más con nosotros</h2>
                                    <p>Eventos, Cursos, Congresos y Mucho Más.</p>
                                    <a class="btn btn-primary btn-lg" href="{{ route('eventos.index') }}">Todos Los Eventos</a>
                                </div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->


    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">¿QUE OFRECEMOS?</h2>
                <p class="text-center wow fadeInDown">Varias opciones que te ayudarán a progresar cada día más en tu profesión y en tu vida diaria.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-child"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Jornadas</h4>
                                <p>Jornadas de unas cuantas horas donde puedes aprender lo necesario sin tener que disponer de mucho tiempo.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Cursos</h4>
                                <p>Cursos de mucho interés para estudiantes y profesionales con horas academicas avaladas por universidades.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-handshake-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Congresos</h4>
                                <p>Celebramos y organizamos congresos de varias especialidades con ponentes expertos en cada tema especializado.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Capacitaciones</h4>
                                <p>Todas las herramientas que necesitas para capacitarte en la labor que necesites ejecutar.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Emprendimiento</h4>
                                <p>Apoyamos a todos y cada uno de los emprendedores en sus ideas para mejorar nuestra sociedad y tu calidad de vida.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Diplomados</h4>
                                <p>Celebramos diplomados con horas academicas avaladas por las mejores universidades nacionales e internacionales.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->


    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><span>APRENDE</span> Y DISFRUTA CON NOSOTROS</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">La mejor inversión que puedes hacer es con tu educación y viajar.</p>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms"><a class="btn btn-primary btn-lg" href="{{ route('eventos.index') }}">Todos Los Eventos</a></p>
                <img class="img-responsive wow fadeIn" src="images/cta2/cta2-img.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms">
            </div>
        </div>
    </section>


    <section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">¿Quienes Somos?</h2>
                <p class="text-center wow fadeInDown">Descubre más sobre nosotros</p>
            </div>

            <div class="row wow fadeInUp">

                <div class="col-md-12">

                    <div class="col-md-6 text-center"><img src="images/quienes-somos.jpg" class="img-responsive img-thumbnail" width="80%" height="auto"></div>    

                    <div class="col-md-6">

                    <p>La fundación El Observatorio Estudiantil nació en Diciembre de 2005, de la inquietud de un grupo de estudiantes y profesionales en querer brindar herramientas Académicas que responda a los cambios y prioridades que se generan día a día en el Ámbito profesional, Bajo la Presidencia del Abogado Rogers Rosario, Magister en Procesal Penal, Presidente de La Empresa Turística Mundo ASSAFAR C.A, Socio de Visión Travel, Actualmente Profesor de Medicina Legal de la Universidad de Los Andes.</p>
 
                    <p>FUNDAEOE inicio su primer evento Académico de Medicina legal del 30 de marzo al 1ero de Abril de 2006, en las instalaciones del colegio de Abogados del Estado Mérida, en vista de la receptividad a nivel nacional de dicho evento, realizamos el 2do para la fecha 28, 29 y 30 de marzo de 2007, en el centro cultural Tulio Febres Cordero; desde ese momento decidimos llevar una secuencia anualmente de este majestuoso tema como es la MEDICINA LEGAL; al transcurrir de los tiempos fuimos implementando más áreas del saber para expandirnos en todo los ámbitos, Tenemos alianzas y convenios con Profesionales en distintas Fuentes Académicas, que desean trabajar, aportar y compartir sus conocimiento científicos, técnicos o prácticos al mundo a través de FUNDAEOE. 
                    Cada año ofrecemos nuevos temas con ponentes de excelencia y calidad. gracias a los avances tecnológicos y a los investigadores que se dedican al mejor desarrollo del tema, disipamos anualmente todo lo innovador  a nuestros participantes</p><br/>

                    <h4 class="text-center">Objetivos</h4>

                    <p>1.- Incrementar el nivel Académico.</p>
                    <p>2.- Estudiar de manera objetiva y Subjetiva al Estudiante y al Profesional.</p>
                    <p>3.- Promover los avances científicos y Académicos.</p>
                    <p>4.- Fomentar las bases éticas, morales y culturales.</p>
                    <p>5.- Lograr la integración de los estudiantes en el campo profesional.</p>
                    <p>6.- Impulsar el perfeccionamiento en el profesional.</p>
                    
                    </div>

                </div>
            <div>


        <div class="divider"></div>

            


            </div>
        </div>
    </div>
    </section><!--/#meet-team-->


     <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <p><img class="img-circle img-thumbnail" src="images/testimonial/01.jpg" alt=""></p>
                                <h4>Cleiber Mora</h4>
                                <small>Abogado</small>
                                <p>El trabajo de Fundaeoe ha sido fundamental en mi carrera, muchas gracias por todo el conocimiento aportado.</p>
                            </div>
                            <div class="item">
                                <p><img class="img-circle img-thumbnail" src="images/testimonial/02.jpg" alt=""></p>
                                <h4>Melani Mendez</h4>
                                <small>Trabajadora Social</small>
                                <p>Muchas gracias por todo a este valioso equipo de Fundaeoe, sin duda estaré en cada congreso que organizen.</p>
                            </div>
                        </div>

                        <!-- Controls -->
                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->

        <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">¿Comó Trabajamos?</h2>
                <p class="text-center wow fadeInDown">Para que no tengas complicaciones te presentamos un video explicativo de como funciona nuestra página.</p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Video Explicativo</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/kJQP7kiw5Fk" frameborder="0" allowfullscreen></iframe> -->
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Super Sencillo</h3>
                    

                    <div class="row">
                        <div class="col-md-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                            <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-check"></i>
                            </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Te Registras</h4>
                                    <p>Dirigete a nuestra area de registro aquí.</p>
                                </div>
                            </div>
                        </div><!--/.col-md-4-->

                        <div class="col-md-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                            <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-check"></i>
                            </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Seleccionas Tu Evento</h4>
                                    <p>Dirigete a nuestra area de eventos aquí.</p>
                                </div>
                            </div>
                        </div><!--/.col-md-4-->

                        <div class="col-md-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                            <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-check"></i>
                            </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Pagas Tu Evento</h4>
                                    <p>Y listo.</p>
                                </div>
                            </div>
                        </div><!--/.col-md-4-->
                </div>

                </div>
            </div>
        </div>
    </section><!--/#about-->
   

    <section id="animated-number">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Aprende Con Nosotros</h2>
                <p class="text-center wow fadeInDown">Te presentamos algunos números que representan las personas que confian en nosotros</p>
            </div>

            <div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="animated-number" data-digit="140" data-duration="1000">140</div>
                        <strong>CONGRESOS</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="animated-number" data-digit="243" data-duration="1000">243</div>
                        <strong>DIPLOMADOS</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="186" data-duration="1000">186</div>
                        <strong>CURSOS</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="animated-number" data-digit="12196" data-duration="1000">12196</div>
                        <strong>EMPRENDEDORES</strong>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#animated-number-->

   

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Confia en nosotros</h2>
                <p class="text-center wow fadeInDown">Somos especialistas en distintas áreas del saber y si tienes alguna duda contactanos</p>
            </div>
        </div>
    </section><!--/#get-in-touch-->

   <section id="contacto" style="padding-top: 20px; padding-bottom: 20px;background-color: #f6fffe" class="wow fadeInUp">
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="contact-form">
                            <h3 style="text-transform: uppercase; text-align: center;">Contactanos</h3><br/>
                            <form name="contact-form" method="POST" action="{{ route('contacto') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="¿Qué Necesitas?" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="mensaje" class="form-control" rows="8" placeholder="Explicanos Aquí" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->
@endsection