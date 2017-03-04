@extends($template)

@section('content')
    <h2>{{ $str }}</h2>
@endsection

@section('title', 'Страница приветствия')

@push('css')
<link rel="stylesheet" href="/css/greet.css">
@endpush