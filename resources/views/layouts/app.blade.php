<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'LaravelTools')</title>

    {{-- <link rel="stylesheet" href="{{ asset("css/global.css") }}"> --}}

    <!-- CDN (simple & stable) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 min-h-screen flex flex-col">

    {{-- Header --}}
    @include('partials.header')

    {{-- Page content --}}
    <main class="flex-1 max-w-4xl mx-auto px-6 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')

</body>
</html>
