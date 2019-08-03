@extends('template.main')

@section('title','Evento')
@section('content')
<section id="">
    <div class="container">
        <br><br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">{{ $evento->titulo }}</h2>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInLeft">
                <p align="center">
                    <img class="img-responsive" src="
                    @if(is_null($evento->afiche) || $evento->afiche == '')
                        /images/afiProx/ND.gif
                    @else
                        /images/afiProx/{{ $evento->afiche }}
                    @endif
                        " alt="">
                </p>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6" style="border: solid 2px #f4f4f4;background-color: #f7f7f7; padding: 25px">
                <div class="wow fadeInLeft">
                    <div style="margin-bottom: 15px">
                        <h3 class="" style="text-align:center;text-transform:uppercase;">Ficha técnica del evento</h3>
                    </div>   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lugar</h3>
                        </div>
                        <div class="panel-body text-center">
                            {{ $evento->direccion }}
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Fecha</h3>
                        </div>
                        <div class="panel-body text-center">
                            @if(($evento->fechaI == $evento->fechaF))
                                <P>El {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaI)->format('d-m-Y') }}</P>
                            @else
                                <P>Desde el {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaI)->format('d-m-Y') }} hasta el {{ \DateTime::createFromFormat('Y-m-d', $evento->fechaF)->format('d-m-Y') }}</P>
                            @endif
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Horas Académicas</h3>
                        </div>
                        <div class="panel-body text-center">
                            {{ $evento->horasA }} hora(s)
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Horas Totales</h3>
                        </div>
                        <div class="panel-body text-center">
                            {{ $evento->horasC }} hora(s)
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Evento avalado por</h3>
                        </div>
                        <div class="panel-body">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators text-center">
                                    @foreach($evento->Avales as $index => $aval)
                                        <li data-target="#myCarousel" @if ($index == 0) class="active" @endif" data-slide-to="{{ $index + 1}}"></li>
                                    @endforeach
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    @foreach($evento->Avales as $index => $aval)
                                        <div class="text-center item @if ($index == 0) active @endif">
                                            <img class="center-block" src="
                                                @if(is_null($aval->Instituto->logo) || $aval->Instituto->logo == '')
                                                    /images/ND.gif
                                                @else
                                                    /images/logos/{{ $aval->Instituto->logo }}
                                                @endif
                                                    " width="128" height="128">
                                            <br>
                                            {{ $aval->Instituto->descripcion }}
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h3 class="text-center wow fadeInRight" style="text-transform: uppercase;">Descripción del evento</h3>
                </div>
                <div class="wow fadeInRight" style="padding: 25px">
                    {!! $evento->notas !!}
                </div>
            </div>
        </div>
        @if (count($evento->Ponentes) != 0)
        <section id="meet-team">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Ponentes</h2>
                <p class="text-center wow fadeInDown">Estos profesionales serán los ponentes de este evento.</p>
            </div>
            <div class="row">
                @foreach($evento->Ponentes as $index => $ponentes)
                <div class="col-sm-6 col-md-3">
                    <div class="text-center team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            @if ($ponentes->Ponente->foto == '' OR is_null($ponentes->Ponente->foto))
                                <img height="180px" class="" src="/images/ponentes/ND.png">
                            @else
                                <img height="180px" class="" src="/images/ponentes/{{ $ponentes->Ponente->foto }}">
                            @endif
                        </div>
                        <div style="height: 160px;" class="team-info">
                            @if($ponentes->Ponente->curriculo != '' and !is_null($ponentes->Ponente->curriculo))<a href="/images/ponentes/curriculums/{{ $ponentes->Ponente->curriculo }}" target="_blank">@endif<h3>{{ $ponentes->Ponente->titulo . ' ' . $ponentes->Ponente->nombre . ' ' . $ponentes->Ponente->apellido}}</h3>@if($ponentes->Ponente->curriculo != '' and !is_null($ponentes->Ponente->curriculo))</a>@endif
                            <span>{{ $ponentes->Ponente->pais }}</span>
                        </div>
                        <div style="height: 130px;">
                            <p>{{ $ponentes->tema }}</p>
                        </div>
                        @if (!($ponentes->Ponente->curriculum == ' ' OR is_null($ponentes->Ponente->curriculum)))
                            <p align="center"><a href="{{ $ponentes->Ponente->curriculum }}" class="btn btn-primary">Curriculum</a></p>
                        @endif
                    </div>
                </div>
                @if ( ($index % 4 == 3) and  ($index != count($evento)-1) ) <div class="col-md-12"><br></div> @endif
                @endforeach
            </div>
        </section>
        @endif

        @if (Auth::guest() OR (Auth::user()->pais <> "VE" AND ($evento->participacion == 'internacional' OR $evento->participacion == 'mixto')))
        <div class="divider"></div>
        <section>
            <div class="wow fadeInLeft">
                <h3 align="center" style="text-transform: uppercase;">Paquetes y Precios</h3>
                <br>
            </div>
            <ul class="nav nav-tabs">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'PAQUETE')
                        <li @if ($active == 1) class="active" @endif><a data-toggle="tab" href="#paqdoll{{ $paquete->id }}">{{ $paquete->titulo }}</a></li>
                        @php ($active = 0)
                    @endif
                @endforeach
            </ul>

            <div class="tab-content">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'PAQUETE')
                        <div id="paqdoll{{ $paquete->id }}" class="tab-pane @if ($active==1) active @endif">
                            @php ($active = 0)
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ipaqdoll{{ $paquete->id }}">Ver detalles</button>
                            <div id="ipaqdoll{{ $paquete->id }}" class="collapse">
                                <br>
                                {!! $paquete->detalles !!}
                            </div>
                            <div class="table-responsive" style="margin-top: 35px"> 
                                <table class="table table-bordered table-hover">
                                    <tr class="active">
                                        <th width="30%">Etapa</th>
                                        <th class="text-center" width="12%">Descuento %</th>
                                        <th class="text-center" width="12%">Te ahorras</th>
                                        <th class="text-center" width="12%">Precio a pagar *</th>
                                        <th class="text-center" width="12%">Fecha Inicio</th>
                                        <th class="text-center" width="12%">Fecha Límite</th>
                                        <th width="10%" class="text-center" style="background-color: white; border-color: white"></th>
                                    </tr>
                                    @foreach($evento->Etapas as $etapa)
                                        @if ($etapa->paquete_id == $paquete->id)
                                            <tr>
                                                <td>
                                                    @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF))
                                                        <span class="label label-primary">Disponible</span>
                                                    @else
                                                        <span class="label label-danger">No disponible</span>
                                                    @endif
                                                    {{ ' - ' . $etapa->titulo }}
                                                </td>
                                                <td align="center">{{ $etapa->descuento }}</td>
                                                <td align="right">{{ number_format(($etapa->descuento * $etapa->costo / 100) / $evento->MonedaCambio, 2, ",", ".") }}</td>
                                                <td align="right">{{ number_format(($etapa->costo - $etapa->descuento * $etapa->costo / 100) / $evento->MonedaCambio, 2, ",", ".") }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaI), 'd-m-Y') }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaF), 'd-m-Y') }}</td>
                                                <td align="center" style="background-color: white; border-color: white">
                                                    <a href="{{ route('eventos.inscribir', ['id' => $etapa->id]) }}" class="btn @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF)) btn-primary @else disabled btn-danger @endif">Inscribir</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <h6 align="center">* Los precios indicados son por persona (por participante) y expresados en {{ $evento->Moneda }}</h6>
            <br>

            <ul class="nav nav-tabs">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'ADICIONAL')
                        <li @if ($active == 1) class="active" @endif><a data-toggle="tab" href="#paqdoll{{ $paquete->id }}">{{ $paquete->titulo }}</a></li>
                        @php ($active = 0)
                    @endif
                @endforeach
            </ul>

            <div class="tab-content">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'ADICIONAL')
                        <div id="paqdoll{{ $paquete->id }}" class="tab-pane @if ($active==1) active @endif">
                            @php ($active = 0)
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ipaqdoll{{ $paquete->id }}">Ver detalles</button>
                            <div id="ipaqdoll{{ $paquete->id }}" class="collapse">
                                <br>
                                {!! $paquete->detalles !!}
                            </div>
                            <div class="table-responsive" style="margin-top: 35px"> 
                                <table class="table table-bordered table-hover">
                                    <tr class="active">
                                        <th width="30%">Etapa</th>
                                        <th class="text-center" width="12%">Descuento %</th>
                                        <th class="text-center" width="12%">Te ahorras</th>
                                        <th class="text-center" width="12%">Precio a pagar *</th>
                                        <th class="text-center" width="12%">Fecha Inicio</th>
                                        <th class="text-center" width="12%">Fecha Límite</th>
                                        <th width="10%" class="text-center" style="background-color: white; border-color: white"></th>
                                    </tr>
                                    @foreach($evento->Etapas as $etapa)
                                        @if ($etapa->paquete_id == $paquete->id)
                                            <tr>
                                                <td>
                                                    @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF))
                                                        <span class="label label-primary">Disponible</span>
                                                    @else
                                                        <span class="label label-danger">No disponible</span>
                                                    @endif
                                                    {{ ' - ' . $etapa->titulo }}
                                                </td>
                                                <td align="center">{{ $etapa->descuento }}</td>
                                                <td align="right">{{ number_format(($etapa->descuento * $etapa->costo / 100) / $evento->MonedaCambio, 2, ",", ".") }}</td>
                                                <td align="right">{{ number_format(($etapa->costo - $etapa->descuento * $etapa->costo / 100) / $evento->MonedaCambio, 2, ",", ".") }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaI), 'd-m-Y') }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaF), 'd-m-Y') }}</td>
                                                <td align="center" style="background-color: white; border-color: white">
                                                    <a href="{{ route('eventos.inscribir', ['id' => $etapa->id]) }}" class="btn @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF)) btn-primary @else disabled btn-danger @endif">Inscribir</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        <section>
            <div class="wow fadeInUp"><br/>
                <h3 align="center" style="text-transform: uppercase;">Formas de Pago en Todos Los Paises Latinoámericanos</h3>
            </div>
            <div class="wow fadeInUp"><br/>
                <p style="text-align: center;">Aceptamos pagos de cualquier parte de Latinoámerica. Puedes pagar tu evento con tarjeta de crédito internacional ó mediante nuestra puerta de pago online.
            </div>        
            <!--
            <div class="wow fadeInUp">
                <p style="text-align: center">
                    <img src="/images/pagos.png" alt="" class="img-responsive" width="100%" height="auto">
                </p>
            </div>
            !-->
        </section>
        @endif

        @if (Auth::guest() OR (Auth::user()->pais == "VE" AND ($evento->participacion == 'nacional' OR $evento->participacion == 'mixto')))
        <div class="divider"></div>
        <a id="paquetes"></a>
        <section>
            <div class="wow fadeInLeft">
                <h3 align="center" style="text-transform: uppercase;">Paquetes y Precios</h3>
                <br>
            </div>

            <ul class="nav nav-tabs">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'PAQUETE')
                        <li @if ($active == 1) class="active" @endif><a data-toggle="tab" href="#paq{{ $paquete->id }}">{{ $paquete->titulo }}</a></li>
                        @php ($active = 0)
                    @endif
                @endforeach
            </ul>

            <div class="tab-content">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'PAQUETE')
                        <div id="paq{{ $paquete->id }}" class="tab-pane @if ($active==1) active @endif">
                            @php ($active = 0)
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ipaq{{ $paquete->id }}">Ver detalles</button>
                            <div id="ipaq{{ $paquete->id }}" class="collapse">
                                <br>
                                {!! $paquete->detalles !!}
                            </div>
                            <div class="table-responsive" style="margin-top: 35px"> 
                                <table class="table table-bordered table-hover">
                                    <tr class="active">
                                        <th width="30%">Etapa</th>
                                        <th class="text-center" width="12%">Descuento %</th>
                                        <th class="text-center" width="12%">Te ahorras</th>
                                        <th class="text-center" width="12%">Precio a pagar *</th>
                                        <th class="text-center" width="12%">Fecha Inicio</th>
                                        <th class="text-center" width="12%">Fecha Límite</th>
                                        <th class="text-center" width="10%" style="background-color: white; border-color: white"></th>
                                    </tr>
                                    @foreach($evento->Etapas as $etapa)
                                        @if ($etapa->paquete_id == $paquete->id)
                                            <tr>
                                                <td>
                                                    @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF))
                                                        <span class="label label-primary">Disponible</span>
                                                    @else
                                                        <span class="label label-danger">No disponible</span>
                                                    @endif
                                                    {{ ' - ' . $etapa->titulo }}
                                                <td align="center">{{ $etapa->descuento }}</td>
                                                <td align="right"> {{ number_format(($etapa->costo - $etapa->descuento * $etapa->costo / 100), 2, ",", ".") }}</td>
                                                <td align="right"> {{ number_format($etapa->valorDolar * $tasaCambio, 2, ",", ".") }}</td>
                                                {{-- <td align="right"> {{ number_format($etapa->descuento * $etapa->costo / 100, 2, ",", ".") }}</td> --}}
                                                <td align="center">{{ date_format(date_create($etapa->fechaI), 'd-m-Y') }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaF), 'd-m-Y') }}</td>
                                                <td align="center" style="background-color: white; border-color: white">
                                                    <a href="{{ route('eventos.inscribir', ['id' => $etapa->id]) }}" class="btn @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF)) btn-primary @else disabled btn-danger @endif">Inscribir</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- WORK HERE! CLEIBERT!!! --}}

            <h6 align="center">* Los precios indicados son por persona (por participante) y expresados en BsF. Los precios no incluyen I.V.A.</h6>
            <br>

            <ul class="nav nav-tabs">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'ADICIONAL')
                        <li @if ($active ==1) class="active" @endif><a data-toggle="tab" href="#paq{{ $paquete->id }}">{{ $paquete->titulo }}</a></li>
                        @php ($active = 0)
                    @endif
                @endforeach
            </ul>

            <div class="tab-content">
                @php ($active = 1)
                @foreach($evento->Paquetes as $paquete)
                    @if ($paquete->tipo == 'ADICIONAL')
                        <div id="paq{{ $paquete->id }}" class="tab-pane @if ($active==1) active @endif">
                            @php ($active = 0)
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ipaq{{ $paquete->id }}">Ver detalles</button>
                            <div id="ipaq{{ $paquete->id }}" class="collapse">
                                <br>
                                {!! $paquete->detalles !!}
                            </div>
                            <div class="table-responsive" style="margin-top: 35px"> 
                                <table class="table table-bordered table-hover">
                                    <tr class="active">
                                        <th width="30%">Etapa</th>
                                        <th class="text-center" width="12%">Descuento %</th>
                                        <th class="text-center" width="12%">Te ahorras</th>
                                        <th class="text-center" width="12%">Precio a pagar *</th>
                                        <th class="text-center" width="12%">Fecha Inicio</th>
                                        <th class="text-center" width="12%">Fecha Límite</th>
                                        <th class="text-center" width="10%" style="background-color: white; border-color: white"></th>
                                    </tr>
                                    @foreach($evento->Etapas as $etapa)
                                        @if ($etapa->paquete_id == $paquete->id)
                                            <tr>
                                                <td>
                                                    @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF))
                                                        <span class="label label-primary">Disponible</span>
                                                    @else
                                                        <span class="label label-danger">No disponible</span>
                                                    @endif
                                                    {{ ' - ' . $etapa->titulo }}
                                                <td align="center">{{ $etapa->descuento }}</td>
                                                <td align="right"> {{ number_format($etapa->descuento * $etapa->costo / 100, 2, ",", ".") }}</td>
                                                <td align="right"> {{ number_format($etapa->costo - $etapa->descuento * $etapa->costo / 100, 2, ",", ".") }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaI), 'd-m-Y') }}</td>
                                                <td align="center">{{ date_format(date_create($etapa->fechaF), 'd-m-Y') }}</td>
                                                <td align="center" style="background-color: white; border-color: white">
                                                    <a href="{{ route('eventos.inscribir', ['id' => $etapa->id]) }}" class="btn @if (date_create(date('Y-m-d'))>=date_create($etapa->fechaI) AND date_create(date('Y-m-d'))<=date_create($etapa->fechaF)) btn-primary @else disabled btn-danger @endif">Inscribir</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- <h6 align="center">* Los precios indicados son por persona (por participante) y expresados en BsF. Los precios no incluyen I.V.A.</h6> 
            <br>
            !-->

        </section>
        <section>
            <div class="wow fadeInRight"><br/>
                <h3 align="center" style="text-transform: uppercase;">Formas de Pago en venezuela</h3>
            </div>
            <div class="table-responsive wow fadeInDown" style="margin-top: 35px"> 
                <table class="table table-bordered table-hover">
                    <tr class="active">
                        <th>BANCO</th>
                        <th>CUENTA</th>
                        <th>A NOMBRE DE</th>
                    </tr>
                    @foreach($bancos as $banco)
                        <tr>
                            <td>{{ $banco->descripcion}}</td>
                            <td>{{ $banco->cuentano}}</td>
                            <td>{{ $banco->empresa}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </section>
        @endif
    </div>
</section>    <!--/contenido -->
@endsection
