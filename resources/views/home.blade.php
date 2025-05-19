<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', "APP NAME") }} - Home</title>
</head>
<body>

    <h3>Our tools:</h3>
    <ul>
        <li><a href="{{ route('slugifier.create') }}">Slugifier</a></li>
        {{-- <li><a href="#">Uuid generator</a></li> --}}
        {{-- <li></li> --}}
    </ul>

    <hr/>

    <h3>Others Services:</h3>
    <ul>
        <li><a href="{{ route('upload.create') }}">Large File uploader</a></li>
        {{-- <li><a href="#">Uuid generator</a></li> --}}
        {{-- <li></li> --}}
    </ul>

</body>
</html>
