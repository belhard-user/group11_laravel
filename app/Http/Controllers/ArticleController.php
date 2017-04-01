<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest('updated_at')->paginate();
        
        return view('articles.index', compact('articles'));
    }

    public function view(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $article = auth()->user()->article()->create($request->all());

        $article->tags()->attach($request->get('tag_list'));

        flash('Отличная работа!', "Новость {$article->title} была создана");
        
        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        if($request->has('tag_list')) {
            $article->tags()->sync($request->get('tag_list'));
        }

        flash('Прекрасно', "Новость {$article->title} была обнавлена");

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }
}
