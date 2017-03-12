@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <article>
            <h2>
                {{ $article->title }}
                <small>{{ $article->date  }}</small>
            </h2>
            <p>{{ $article->short_description }}</p>
            <a href="{{ route('article.show', ['slug' => $article->slug]) }}">глянуть</a>
        </article>
    @endforeach
@endsection