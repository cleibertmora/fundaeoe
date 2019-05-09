@extends('template.main')

@section('title', 'Lista de Ponentes')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Ponentes</h1>
    <a href="{{ route('ponente.create') }}" class="btn btn-info">Registrar Nuevo Ponente</a>
    {!! Form::open(['route' => 'ponente.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Ponente...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <th width="10%"></th>
            <th width="10%">Título</th>
            <th width="30%">Nombre(s)</th>
            <th width="30%">Apellido(s)</th>
            <th width="10%"></th>
        </thead>
        <tbody>
            @foreach($ponentes as $ponente)
                <tr>
                    @if($ponente->foto == '' or is_null($ponente->foto))
                        <td style="text-align:center"><img src="/images/ponentes/ND.png" style="height:36px"></td>
                    @else
                        <td style="text-align:center"><img src="/images/ponentes/{{ $ponente->foto }}" style="height:36px"></td>
                    @endif
                    <td style="vertical-align:middle">{{ $ponente->titulo }}</td>
                    <td style="vertical-align:middle">{{ $ponente->nombre }}</td>
                    <td style="vertical-align:middle">{{ $ponente->apellido }}</td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('ponente.edit', $ponente->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('ponente.destroy', $ponente->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ponentes->render() !!}
</div>
@endsection