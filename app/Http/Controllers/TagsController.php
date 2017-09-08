<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Tag;
use Laracasts\Flash\Flash;

class TagsController extends Controller
{
   	public function index(Request $request)
	{


		$tags = Tag::Search($request->name)->orderBy('id', 'ASC')->paginate(3);
		return view('admin.tags.index')->with('tags', $tags);

	}




	public function create()
	{
		return view('admin.tags.create');
	}




	public function store(TagRequest $request)
	{

		$tag = new Tag($request->all());
		$tag->save();

		Flash::success('El tag ' . $tag->name . ' ha sido creado exitosamente');
		return redirect()->route('tags.index');

		
	}

	


	public function show($id)
	{

	}



	public function edit($id)
	{

	
	$tag = Tag::find($id);
	return view('admin.tags.edit')->with('tag', $tag);


	}



	public function update(Request $request, $id)
	{
		$tag = Tag::find($id);
		$tag->fill($request->all());
		$tag->save();

		Flash::success('Se ha editado el tag ' . $tag->name . ' exitosamente');
		return redirect()->route('tags.index');

	}



	public function destroy($id)
	{
	$tag = Tag::find($id);
	$tag->delete();

	Flash::error('Se ha eliminado el tag ' . $tag->name . ' exitosamente');
		return redirect()->route('tags.index');
	}
}
