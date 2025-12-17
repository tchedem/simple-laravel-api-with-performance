@extends('layouts.app')

@section('title', 'Slugifier')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Slugifier</h2>

    <form action="{{ route('slugifier.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Text
            </label>
            <input type="text" name="string" placeholder="Enter your text" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Separator
            </label>
            <input type="text" name="separator" value="-" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Generate
        </button>
    </form>

    {{-- Result --}}
    @if (!empty($slugify_string))
        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-2">Result</h3>

            <div class="flex items-center gap-4 bg-gray-100 p-3 rounded">
                <p id="text" class="flex-1 font-mono text-gray-800">
                    {{ $slugify_string }}
                </p>

                <button type="button" onclick="copyToClipboard()"
                    class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Copy
                </button>
            </div>

        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('home') }}" class="text-blue-600 underline">
            ← Back to home
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        function copyToClipboard() {
            const text = document.getElementById("text").innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert("Text copied to clipboard!");
            });
        }
    </script>
@endpush
