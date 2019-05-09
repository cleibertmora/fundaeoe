@extends('template.main')

@section('title','Error 500')
@section('content')
<section id="portfolio">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="section-header"><br/>
                    <h2 class="section-title text-center wow fadeInDown">PROBLEMAS CON EL SERVIDOR</h2>
                </div>
                <div class="row">
                    <div class="text-center wow fadeInRight">
                        <h2>En estos momentos presentamos problemas con el Servidor. Por favor, intente más tarde.</h2><br/>
                        <a href="/"><h4>&#8592; Puedes regresar a la página principal haciendo click aquí</h4></a>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/.container-->
</section><!--/#portfolio-->
@endsection