<!DOCTYPE html>
		<html>
		<head>
			<title>{{$prueba->title}}</title>
			<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
		</head>
		<body>
		Hola CCEO 
		<br><br>
		<h1>{{$prueba->title}}</h1>
		<hr>
			{{ $prueba->content }}

				@for($i = 0; $i <= 5; $i++)
					{{ $i }}
				@endfor

					@if (1 ==1)	
					{{"Eres chido"}}
					@endif
		<hr>
			{{ $prueba->user->name }} | {{ $prueba->category->name }} | 


			@foreach($prueba->tags as $tag)
			
			{{ $tag->name }}

			@endforeach
		</body>
		</html>		






