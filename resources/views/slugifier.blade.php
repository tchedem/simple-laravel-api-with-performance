<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', "APP NAME") }} - Slugifier</title>
</head>
<body>

    <h4>Slugifier</h4>

    <form action="{{ route('slugifier.create') }}" method="post">
        @csrf
        <div>
            <label for="string">Text</label>
            <input type="text" placeholder="Enter your text" name="string" required=true>
        </div>
        <br>
        <div>
            <label for="string">Separetor</label>
            <input type="text" placeholder="Enter the separator" value="-" name="separator" required=true>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    <hr>


    <div>
        <h4>Result</h4>
        {{-- @if ($slugify_string ?? null) --}}
        <div style="display: flex; align-items: center; gap: 10px;">
            <p id='text'>{{ $slugify_string ?? null }}</p>
            <button onclick="copyToClipboard()">Copy</button>
        </div>
        {{-- @endif --}}
    </div>

    <br>

    <button><a href="{{ route('home') }}">Back</a></button>

</body>

<script>
    function copyToClipboard() {
        const text = document.getElementById("text").innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert("Text copied to clipboard!");
        }).catch(err => {
            console.error("Failed to copy text: ", err);
        });
    }
</script>

</html>