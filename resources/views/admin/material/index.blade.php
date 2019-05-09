@extends('template.main')

@section('title', 'Lista de Materiales')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Materiales</h1>
    <a href="{{ route('material.create') }}" class="btn btn-info">Registrar Nuevo Material</a>
    {!! Form::open(['route' => 'banco.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">         
            {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar Material...', 'aria-describedby' => 'search']) !!}
            <span  class="input-group-addon" id='search'><span class="glyphicon glyphicon-search" aria-hidden='true'></span></span>   
        </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <th width="10%"></th>
            <th width="80%">Descripción</th>
            <th width="10%"></th>
        </thead>
        <tbody>
            @foreach($materiales as $material)
                <tr>
                    @if($material->logo == '' or is_null($material->logo))
                        <td style="text-align:center"><img src="/images/ND.gif" style="height:36px"></td>
                    @else
                        <td style="text-align:center"><img src="/images/logos/{{ $material->logo }}" style="height:36px"></td>
                    @endif
                    <td style="vertical-align:middle">{{ $material->descripcion }}</td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('material.edit', $material->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-wrench" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('material.destroy', $material->id) }}" onClick="return confirm('Seguro que deseas eliminarlo?')"class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $materiales->render() !!}
</div>
@endsection