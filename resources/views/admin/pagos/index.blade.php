@extends('template.main')

@section('title', 'Lista de Pagos')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Lista de Pagos por Verificar</h1>
    <a href="{{ route('pagos.verificados') }}" class="btn btn-success">Verificados</a>
    <a href="{{ route('pagos.rechazados') }}"  class="btn btn-danger">Rechazados</a>
    {!! Form::open(['route' => 'pagos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Pago...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <th width=" 5%" style="text-align:center">ID</th>
            <th width=" 8%" style="text-align:center">Condición</th>
            <th width=" 8%" style="text-align:center">Fecha</th>
            <th width="32%">Evento</th>
            <th width="15%">Usuario</th>
            <th width="12%" style="text-align:center">Referencia</th>
            <th width="10%" style="text-align:center">Monto</th>
            <th width="10%"></th>
        </thead>
        <tbody>
            @if (count($pagos) == 0 )
                <tr>
                    <td colspan="8" style="vertical-align:middle; text-align:center">
                        <br><br><br><br><br><br><br>
                        No Existen Registros
                        <br><br><br><br><br><br><br>
                    </td>
                </tr>
            @else 
                @foreach($pagos as $pago)
                    <tr>
                        <td style="vertical-align:middle; text-align:center">{!! $pago->id !!}</td>
                        <td style="vertical-align:middle; text-align:center">
                            @if ($pago->condicion==0)
                                <span class="label label-warning">Por Verificar</span>
                            @elseif ($pago->condicion==1)
                                <span class="label label-success">Verificado</span>
                            @else
                                <span class="label label-danger">Rechazado</span>
                            @endif
                        </td>
                        <td style="vertical-align:middle; text-align:center">{!! date_format(date_create($pago->fechaTrans), 'd-m-Y') !!}</td>
                        <td style="vertical-align:middle">{!! $pago->Evento->titulo !!}</td>
                        <td style="vertical-align:middle">{!! $pago->Usuario->fullName !!}</td>
                        <td style="vertical-align:middle; text-align:center">{!! $pago->documento !!}</td>
                        <td style="vertical-align:middle; text-align:right ">{!! number_format($pago->monto, 2, ",", ".") !!}</td>                    
                        <td style="vertical-align:middle">
                            <a href="{{ route('pagos.verificar', $pago->id) }}" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                            </a>
                            <a href="{{ route('pagos.rechazar', $pago->id) }}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $pagos->render() !!}
</div>
@endsection