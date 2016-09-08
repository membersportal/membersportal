<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{
	public function index()
	{
		$articles = Article::paginate(5);
		$data = compact('articles');
		return view('articles.all_articles')->with($data);
	}

	public function adminIndex()
	{
		$articles = Article::paginate(5);
		$paginate = 5;
		$data = compact('articles', 'paginate');
		return view('admin.admin_manage_articles')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.admin_create_article');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$article = new Article();
		return $this->validateAndSave($article, $request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		$data = compact('article');
		return view('admin.admin_edit_article')->with($data);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$article = Article::findOrFail($id);
		return $this->validateAndSave($article, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		$article->delete();
		return redirect()->action('admin.admin_dashboard');
	}

	private function validateAndSave(Article $article, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'Article not created successfully.');
		$this->validate($request, Article::$rules);
		$request->session()->forget('ERROR_MESSAGE');
		$article->heading = $request->heading;
		$article->subheading = $request->subheading;
		$article->desc = $request->desc;
		$this->storeImage($request, $article);
		$article->url = $request->url;
		$article->save();
		$request->session()->flash('message', 'Article successfully saved.');
		return redirect()->action('ArticlesController@adminIndex');
	}

	private function storeImage($request, $article)
	{
		$file = $request->file('img')->getClientOriginalName();
		$request->file('img')->move(public_path('img'), $request->file('img')->getClientOriginalName());
		$file_path = public_path('img/articles') . '/' . $request->file('img')->getClientOriginalName();
		$article->img = $file;
	}
}
