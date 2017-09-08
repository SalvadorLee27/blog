@extends('admin.template.main')

@section('title', 'Listado de articulos')

@section('content')


<a href="{{ route('articles.create')}}" class="btn btn-info">Registrar nuevo articulo</a>

{!!	Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right' ])	!!}

<div class="form-group">
{!!	Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar articulo..'])	!!}
	

</div>

	{!!	Form::close()!!}

<table class="table table-striped">
<thead>
	<th>ID</th>
	<th>Titulo</th>
	<th>Categoria</th>
	<th>Usuario</th>
	<th>Accion</th>

</thead>
<tbody>
	@foreach($articles as $article)
	<tr>
		<td>{{$article->id}}</td>
		<td>{{$article->title}}</td>
		<td>{{$article->category->name}}</td>
		<td>{{$article->user->name}}</td>
		<td>
		
		<a href="{{route('articles.edit', $article->id)}}" class="btn btn-warning"></a><a href="{{route('articles.destroy', $article->id)}}" onclick="return confirm ('Seguro que deseas eliminar este articulo?')" class="btn btn-danger"></a>	

		</td>
	</tr>

	@endforeach
</tbody>
</table>
<div class="text-center">
	{!!	$articles->render()!!}
</div>


@endsection