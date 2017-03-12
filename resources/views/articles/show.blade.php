@extends('layouts.app')

@section('content')
    <h1>
        {{ $article->title }}
        <hr>
        <small>новость создана {{ $article->updated_at->diffForHumans() }}</small>
    </h1>

    <p>{{ $article->description }}</p>
@endsection