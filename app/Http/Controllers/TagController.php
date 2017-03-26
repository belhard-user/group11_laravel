<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function articlesByTagsSlug(Tag $tag)
    {
        $articles = $tag->articles()->paginate();

        return view('tag.articleByTagsSlug', compact('articles'));
    }
}
