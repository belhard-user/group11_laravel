@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'article.store']) !!}
    @include('articles.form_part', ['btnText' => 'Создать новость'])
    {!! Form::close() !!}
@endsection