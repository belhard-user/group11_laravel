@extends($template)

@section('content')
    {!! $title !!}

    @foreach($names as $name)
       <p>
           <a href="{{ route('greet', ['name' => 'admin', 'people' => $name]) }}">{{ $name }}</a>
       </p>
    @endforeach
@endsection

@section('title', 'Люди которы мне нравятся')