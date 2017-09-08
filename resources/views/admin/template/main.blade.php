<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<title>@yield('title', 'Default') |Panel de Administracion</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
</head>
<body>
	
	@include('admin.template.partials.nav')
		<section>
		    @include('flash::message')
		    @include('admin.template.partials.errors')
			@yield('content')
		</section>


		<footer>
			
		</footer>

	<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>	
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
	@yield('js')
</body>
</html>