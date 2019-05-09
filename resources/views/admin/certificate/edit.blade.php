@extends('template.main')

@section('title', 'Editar Certificado')

@section('content')

<div class="container">

	<h1 class=page-header id=glyphicons>Editar Certificado 	<a href="{{ route('certificado.index') }}" class="btn btn-info pull-right"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Regresar</a></h1>

	{!! Form::model($certificate, ['route' => ['certificados.update', $certificate->id], 'method' => 'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
	
		@include('admin.certificate.partials.form')
		
	{!! Form::close() !!}

</div>

@endsection

@section('custom_js')

    <script src="/plugins/moment/moment.js"></script>
	<script src="/plugins/bootstrap/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		var ajaxPath = '{{ URL::route('traerNombre') }}';
	</script>
	<script type="text/javascript" src="{{ asset('js/formCertificate.js') }}"></script>

@endsection