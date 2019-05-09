@extends('template.main')

@section('title', 'Lista de Politicas')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Politicas</h1>
    <a href="{{ route('politica.create') }}" class="btn btn-info">Registrar Nueva Politica</a>
    {!! Form::open(['route' => 'politica.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Politica...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <th width="10%"></th>
            <th width="80%">Detalles</th>
            <th width="10%"></th>
        </thead>
        <tbody>
            @foreach($politicas as $politica)
                <tr>
                    <td style="text-align:center"></td>
                    <td style="vertical-align:middle">{!! $politica->detalles !!}</td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('politica.edit', $politica->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('politica.destroy', $politica->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $politicas->render() !!}
</div>
@endsection