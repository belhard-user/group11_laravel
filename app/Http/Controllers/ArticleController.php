<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('updated_at')->paginate();
        
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
        Article::create($request->all());

        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }
}
