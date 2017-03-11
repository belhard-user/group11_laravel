@extends('layouts.app')

@section('content')

    <form action="{{ action('DBController@select') }}">
        <select name="age">
            @foreach(range(20, 65) as $num)
                @if(Request::get('age') == $num)
                    <option selected value="{{ $num }}">{{ $num }}</option>
                @else
                    <option value="{{ $num }}">{{ $num }}</option>
                @endif
            @endforeach
        </select>
        <button>click</button>
    </form>

    @if($tests instanceof Illuminate\Support\Collection)
        <h1>Всего людей ({{ $tests->count() }}) средний возраст ({{ $avg }})</h1>
        @foreach($tests as $test)
            <div>
                <h3>{{ $test->name }}</h3>
                <p>{{ $test->age }} @ {{ $test->email }}</p>
            </div>
        @endforeach
    @else
        <div>
            <h3>{{ $tests->name }}</h3>
            <p>{{ $tests->age }} @ {{ $tests->email }}</p>
        </div>
    @endif

@endsection