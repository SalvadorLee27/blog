<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Laracasts\Flash\Flash;

class CategoriesController extends Controller
{
   	public function index()
	{
		$category = Category::orderBy('id', 'ASC')->paginate(3);
		return view('admin.categories.index')->with('categories', $category);

	}




	public function create()
	{
		return view('admin.categories.create');
	}




	public function store(CategoryRequest $request)
	{

		$category = new Category($request->all());
		$category->save();

		Flash::success('La categoria ' . $category->name . ' Ha sido creada exitosamente');
		return redirect()->route('categories.index');

		
	}

	


	public function show($id)
	{

	}



	public function edit($id)
	{

	$category = Category::find($id);
	return view('admin.categories.edit')->with('category', $category);


	}



	public function update(Request $request, $id)
	{
		$category = Category::find($id);
		$category->fill($request->all());
		$category->save();

		Flash::success('Se ha editado la categoria ' . $category->name . ' exitosamente');
		return redirect()->route('categories.index');

	}



	public function destroy($id)
	{
	$category = Category::find($id);
	$category->delete();

	Flash::error('Se ha eliminado la categoria ' . $category->name . ' exitosamente');
		return redirect()->route('categories.index');
	}

}
