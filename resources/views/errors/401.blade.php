@extends('template.main')

@section('title','Error 401')
@section('content')
<section id="portfolio">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="section-header"><br/>
                    <h2 class="section-title text-center wow fadeInDown">ACCESO DENEGADO</h2>
                </div>
                <div class="row">
                    <div class="text-center wow fadeInRight">
                        <h2>Parece que no deberías estar aquí...</h2><br/>
                        <a href="/"><h4>&#8592; Puedes regresar a la página principal haciendo click aquí</h4></a>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/.container-->
</section><!--/#portfolio-->
@endsection