@extends('template.main')

@section('title','Rifas')

@section('content')

<section id="blog">

    <div class="container">

        <div class="section-header">

            <h2 class="section-title text-center wow fadeInDown">Rifas</h2>

            <p class="text-center wow fadeInDown">Desde aquí se pueden administrar todas las rifas de la fundación.</p>

        </div>


        <div class="col-md-12">
            
            <div class="row">
                <a href="{{ route('rifas.create') }}" role="button" class="btn btn-primary pull-right">Nueva Rifa</a> 
                <a href="{{ route('rifas.reporte') }}" role="button" class="btn btn-warning pull-right">Reporte Tickets</a>
            </div>
        
            <hr>

            <div class="row">
                <h3>Rifas Activas</h3>
            </div>

<!--

                @foreach($rifas as $rifa)

                     <div class="panel panel-default">
                        <div class="panel-heading">Nombre de la rifa: {{ $rifa->nombre }}</div>
                        <div class="panel-body">
                            <p><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> País: {{ $rifa->pais }}</p>  
                            <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Ciudad: {{ $rifa->ciudad }}</p>
                            <p><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Descripción: {{ $rifa->descripcion }}</p>
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Fecha Inicio: {{ $rifa->fecha_in }}</p>
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Fecha Fin: {{ $rifa->fecha_fin }}</p>
                            <p><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Valor del ticket: {{ $rifa->valor_ticket }}</p>
                            <a href="#" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                        </div>
                    </div>

                @endforeach

-->
             @foreach($rifas as $rifa)
                
                @if($rifa->status == "activo")

                    <div class="panel panel-info">
                        <div class="panel-heading"> <b>Nombre de la rifa:</b> {{ $rifa->nombre }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                        <p><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <b>País:</b> {{ $rifa->pais }}</p>  
                                        <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <b>Ciudad:</b> {{ $rifa->ciudad }}</p>
                                        <p><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <b>Descripción:</b> {{ $rifa->descripcion }}</p>
                                        <p><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <b>Cláusula(s):</b> {{ $rifa->clausula }}</p>            
                                </div>
                                <div class="col-md-6">
                                        <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <b>Fecha Inicio:</b> {{ $rifa->fecha_in }}</p>
                                        <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <b>Fecha Fin:</b> {{ $rifa->fecha_fin }}</p>
                                        <p><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> <b>Valor del ticket:</b> {{ $rifa->valor_ticket }}</p>
                                        <p><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <b>Premio(s):</b> {{ $rifa->premio }}</p>
                                </div>
                            </div>
                            <a href="{{ route('rifas.edit', $rifa->id) }}" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                        </div>
                    </div>

                @endif

            @endforeach

            <hr>

            <div class="row">
                <h3>Rifas Inactivas</h3>
            </div>

            @foreach($rifas as $rifa)
                
                @if($rifa->status == "inactivo")

                    <div class="panel panel-warning">
                        <div class="panel-heading"> <b>Nombre de la rifa:</b> {{ $rifa->nombre }}</div>
                        <div class="panel-body">
                            <p><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <b>País:</b> {{ $rifa->pais }}</p>  
                            <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <b>Ciudad:</b> {{ $rifa->ciudad }}</p>
                            <p><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <b>Descripción:</b> {{ $rifa->descripcion }}</p>
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <b>Fecha Inicio:</b> {{ $rifa->fecha_in }}</p>
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <b>Fecha Fin:</b> {{ $rifa->fecha_fin }}</p>
                            <p><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> <b>Valor del ticket:</b> {{ $rifa->valor_ticket }}</p>
                            <a href="{{ route('rifas.edit', $rifa->id) }}" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                        </div>
                    </div>

                @endif

            @endforeach
        
        </div>     
        
    </div>

</section>

@endsection