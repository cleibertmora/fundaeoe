@extends('template.main')

@section('title', 'Editar Pago')
@section('content')
<div class="container">
    <h1 class=page-header id=glyphicons>Procesar Pago</h1>
    <div class="col-sm-8">
        {!! Form::open(['route' => ['pagos.update',$pago], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-4">
    </div>  
</div>
@endsection