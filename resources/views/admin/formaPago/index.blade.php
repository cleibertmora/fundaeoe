@extends('template.main')

@section('title', 'Lista de Forma de Pagos')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Formas de Pago</h1>
    <a href="{{ route('formaPago.create') }}" class="btn btn-info">Registrar Nueva Forma de Pago</a>
    {!! Form::open(['route' => 'formaPago.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Forma de Pago...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>    
    <table class="table table-striped">
        <thead>
            <th width="10%"></th>
            <th width="40%">Forma</th>
            <th width="40%">Tipo</th>
            <th width="10%"></th>
        </thead>
        <tbody>
            @foreach($formasPago as $formaPago)
                <tr>
                    <td style="text-align:center"></td>
                    <td style="vertical-align:middle">{{ $formaPago->forma }}</td>
                    <td style="vertical-align:middle">{{ $formaPago->tipo }}</td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('formaPago.edit', $formaPago->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('formaPago.destroy', $formaPago->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $formasPago->render() !!}
</div>
@endsection