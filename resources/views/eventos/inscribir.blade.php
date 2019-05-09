@extends('template.main')

@section('title','Inscribir Evento')
@section('content')
<section id="">
    <div class="container">
        <br><br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">{{ $etapa->Evento->titulo }}</h2>
        </div>
        <h2>{{ $etapa->Paquete->titulo }}</h2>
        <h3>{{ $etapa->titulo }}</h3>
        <div style="text-align: right;">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#infuser">
                Usuario: {{ Auth::user()->id }} - {{ Auth::user()->fullName }}
                <span class="glyphicon glyphicon-chevron-down" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
            </button>
            <div id="infuser" class="collapse">
                <br>
                <h4>Saldo a favor: {{ number_format(Auth::user()->saldo, 2, ",", ".") }}</h4>
            </div>
        </div>
        <br><br>
        @if (count($clipaqs) == 0)
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" data-toggle="collapse" data-target="#politcs">
                    <span class="glyphicon glyphicon-chevron-down" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Políticas y Condiciones</h4>
            </div>
            <div class="modal-body" style="line-height:16px;">
                <div id="politcs" class="collapse in">
                    <ol>
                        @foreach($politicas as $politica)
                            <li>{!! $politica->detalles !!}</li><br>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <h4>He leido las políticas y condiciones. ¿Deseo inscribirme en el evento?</h4><br>
                {!! Form::open(['route' => ['eventos.inscribirS'], 'method' => 'POST']) !!}
                    {{ csrf_field() }}
                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                    {!! Form::hidden('etapa_id', $etapa->id) !!}
                    {!! Form::submit('Aceptar',  ['class' => 'btn btn-success']) !!}
                    {!! Form::submit('Rechazar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        @else
            <div>
                <h3 class="section-title text-center wow fadeInDown">Evento Inscrito</h3>
            </div>
            <div class="row">
                <div class="col-md-12 wow fadeInLeft">
                    <table class="table table-striped text-center">
                        <thead>
                            <th width="10%" style="text-align:center;"">ID Cuenta</th>
                            <th width="55%">Evento</th>
                            <th width="20%" style="text-align:center;">Fecha de Inscripción</th>
                            <th width="15%"></th>
                        </thead>
                        <tbody>
                            @foreach($cuentas as $cuenta)
                                <tr data-toggle="collapse" data-target=".evento{{$cuenta->id}}">
                                    <td style="vertical-align:middle">{!! $cuenta->id !!}</td>
                                    <td style="vertical-align:middle; text-align:left;">{!! $cuenta->Evento->titulo !!}</td>
                                    <td style="vertical-align:middle">{{ $cuenta->fec }}</td>
                                    <td style="vertical-align:middle"></td>
                                </tr>
                            @foreach($clipaqs as $clipaq)
                            @if ($clipaq->evento_id == $cuenta->Evento->id)
                                <tr class="collapse in evento{{$cuenta->id}}">
                                    <td></td>
                                    <td style="vertical-align:middle; text-align:left;">
                                        {{ $clipaq->Paquete->titulo }}<br>{{ $clipaq->Etapa->titulo }}
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</section> 
@endsection