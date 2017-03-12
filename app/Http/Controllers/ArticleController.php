<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        
        return view('articles.index', compact('articles'));
    }

    public function view($article)
    {
        $article = Article::whereSlug($article)->first();
        
        return view('articles.show', compact('article'));
    }
}
