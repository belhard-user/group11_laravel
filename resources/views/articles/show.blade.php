@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('article.edit', ['slug' => $article->slug]) }}">Клац</a>
        </div>
    </div>
    <h1>
        {{ $article->title }}
        <hr>
        <small>новость создана {{ $article->updated_at->diffForHumans() }}</small>
    </h1>

    <p>{{ $article->description }}</p>
    <p class="pull-right">{{ $article->user->email }}</p>

    <div class="row">
        <div class="col-md-12">
            @unless($article->tags->isEmpty())
                @foreach($article->tags as $tag)
                    <a href="{{ route('bytagname', ['tag' => $tag->slug]) }}" class="label label-info">{{ $tag->title }}</a>
                @endforeach
            @endunless
        </div>
    </div>
@endsection