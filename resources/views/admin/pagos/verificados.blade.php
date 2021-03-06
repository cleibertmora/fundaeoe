@extends('template.main')

@section('title', 'Lista de Pagos')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Lista de Pagos Verificados</h1>
    <a href="{{ route('pagos.index') }}" class="btn btn-warning">Por Verificar</a>
    <a href="{{ route('pagos.rechazados') }}" class="btn btn-danger">Rechazados</a>
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
            <th width="37%">Evento</th>
            <th width="20%">Usuario</th>
            <th width="12%" style="text-align:center">Referencia</th>
            <th width="10%" style="text-align:center">Monto</th>
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
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $pagos->render() !!}
</div>
@endsection