<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="/validate-data-test">
    <input type="text" name="name" value="{{ old('name') }}" />
    <input type="text" name="age" value="{{ old('age') }}" />
    <button>asdasd</button>
</form>

</body>
</html>