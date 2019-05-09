@extends('template.main')

@section('title', 'Lista de Eventos')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Eventos</h1>
    <a href="{{ route('evento.create') }}" class="btn btn-info">Registrar Nuevo Evento</a>
    {!! Form::open(['route' => 'evento.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Evento...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <th width="10%"></th>
            <th width="40%">Título</th>
            <th width="15%">Fecha de Inicio</th>
            <th width="15%">Fecha de Finalización</th>
            <th width="20%"></th>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    @if($evento->afiche == '' or is_null($evento->afiche))
                        <td style="text-align:center"><img src="/images/ND.gif" style="height:80px"></td>
                    @else
                        <td style="text-align:center"><img src="/images/afiProx/{{ $evento->afiche }}" style="height:80px"></td>
                    @endif
                    <td style="vertical-align:middle">{!! $evento->titulo !!}</td>
                    <td style="vertical-align:middle">{{ date_format(date_create($evento->fechaI), 'd-m-Y') }}</td>
                    <td style="vertical-align:middle">{{ date_format(date_create($evento->fechaF), 'd-m-Y') }}</td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('evento.extend', $evento->id) }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-list-alt" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('evento.reporte', $evento->id) }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-file" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('evento.edit', $evento->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('evento.destroy', $evento->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $eventos->render() !!}
</div>
@endsection
