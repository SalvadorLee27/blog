<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use Laracasts\Flash\Flash;
use Illuminate\Database\Query\Lists;

class ArticlesController extends Controller
{
      	public function index(Request $request)
	{
		$articles = Article::Search($request->title)->orderBy('id', 'ASC')->paginate(3);
		$articles->each(function($articles)
		{
			$articles->category;
			$articles->user;
		});
		return view('admin.articles.index')->with('articles', $articles);

	}




	public function create()
	{
		$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
		$tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

		return view('admin.articles.create')->with('categories', $categories)->with('tags', $tags);
	}




	public function store(Request $request)
{
		  



		if($request->file('image'))
		{
			$file = $request->file('image');
			$name ='blog_' . time() . '.' . $file->getClientOriginalExtension();
			$path = public_path() . '/images/articles/';
			$file->move($path, $name);
	
		}

		$article = new Article($request->all());
		$article->user_id = \Auth::user()->id;
		$article->save();

		$article->tags()->sync($request->tags);
		
		$image = new Image();
		$image->name = $name;
		$image->article()->associate($article);
		$image->save();

		
		Flash::success('El articulo ' . $article->title . ' ha sido creado exitosamente');
		return redirect()->route('articles.index');
		
	}

	


	public function show($id)
	{

	}



	public function edit($id)
	{

	$article = Article::find($id);
	$article->category;
	$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
	$tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

	$my_tags = $article->tags->pluck('id')->ToArray();


	return view('admin.articles.edit')->with('categories', $categories)->with('article', $article)->with('tags', $tags)->with('my_tags', $my_tags);


	}



	public function update(Request $request, $id)
	{
		$article = Article::find($id);
		$article->fill($request->all());
		$article->save();

		$article->tags()->sync($request->tags);

		Flash::success('Se ha editado el articulo ' . $article->title . ' exitosamente');
		return redirect()->route('articles.index');

	}



	public function destroy($id)
	{
	$article = Article::find($id);
	$article->delete();

	Flash::error('Se ha eliminado el articulo ' . $article->title . ' exitosamente');
		return redirect()->route('articles.index');
	}
}
