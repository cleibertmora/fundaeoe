@extends('template.main')

@section('title', 'Lista de Inscritos')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>{{$evento->titulo}} - Lista de Inscritos</h1>
    {!! Form::open(['route' => ['evento.reporte',$evento->id], 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Inscrito...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <th width="15%" style="text-align:center">ID</th>
            <th width="85%" style="text-align:center">Nombres y Apellidos</th>
        </thead>
        <tbody>
	    @if (count($clipaqs) == 0 )
                <tr>
                    <td colspan="8" style="vertical-align:middle; text-align:center">
                        <br><br><br><br><br><br><br>
                        No Existen Registros
                        <br><br><br><br><br><br><br>
                    </td>
                </tr>
            @else
		@foreach($clipaqs as $clipaq)
		    <tr>
                        <td style="vertical-align:middle; text-align:center">{!! $clipaq->Usuario->id !!}</td>
                        <td style="vertical-align:middle; text-align:center">{!! $clipaq->Usuario->fullName !!}</td>
		    </tr>
		@endforeach
	    @endif
        </tbody>
    </table>
</div>
@endsection
