<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

		<!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('title', 'FUNDAEOE') | FUNDAEOE</title>

		<!-- Scripts -->
	    <script>
	        window.Laravel = {!! json_encode([
	            'csrfToken' => csrf_token(),
	        ]) !!};
	    </script>

	    @include('template.partials.head')

	</head>
	<body>
		@include('template.partials.nav')
		<div class="bs-docs-container">
		   @include('vendor.flash.notif')
		   @yield('content')
		</div>
		@include('template.partials.footer')
		@yield('custom_js')
	</body>
</html>