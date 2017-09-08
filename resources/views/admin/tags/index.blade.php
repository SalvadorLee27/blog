@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')


<a href="{{ route('tags.create')}}" class="btn btn-info">Registrar nuevo tag</a>

	{!!	Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right' ])	!!}

<div class="form-group">
{!!	Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag..'])	!!}
	

</div>

	{!!	Form::close()!!}

<table class="table table-striped">
<thead>
	<th>ID</th>
	<th>Nombre</th>
	<th>Accion</th>

</thead>
<tbody>
	@foreach($tags as $tag)
	<tr>
		<td>{{$tag->id}}</td>
		<td>{{$tag->name}}</td>
		<td>
		
		<a href="{{route('tags.edit', $tag->id)}}" class="btn btn-warning"></a><a href="{{ route('tags.destroy', $tag->id) }}" onclick="return confirm ('Seguro que deseas eliminar este tag?')" class="btn btn-danger"></a>	

		</td>
	</tr>

	@endforeach
</tbody>
</table>
<div class="text-center">
	{!!	$tags->render()!!}
</div>


@endsection