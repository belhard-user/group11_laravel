@extends('layouts.app')

@section('content')

        <h1>Всего людей ({{ $tests->count() }}) средний возраст ({{ $avg }})</h1>
        @foreach($tests as $test)
            <div>
                <h3>{{ $test->name }}</h3>
                <p>{{ $test->print_info }}</p>
            </div>
        @endforeach

@endsection