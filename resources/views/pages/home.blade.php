@extends('layouts.app')

@section('title', 'Home - LaravelTools')

@section('content')
    <h2 class="text-3xl font-bold mb-4">Laravel Tools & Services</h2>

    <p class="mb-6 text-gray-700">
        Build better, faster with our collection of utilities and performance demos.
    </p>

    <a href="#tools" class="text-blue-600 underline mb-6 inline-block">
        Explore Tools
    </a>

    {{-- Tools Table --}}
    <section id="tools" class="mt-6">
        <h3 class="text-2xl font-semibold mb-4">Our Tools</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left p-3 border-b">Tool</th>
                        <th class="text-left p-3 border-b">Description</th>
                        <th class="text-left p-3 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    {{-- Slugifier --}}
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 font-medium">Slugifier</td>
                        <td class="p-3 text-gray-600">Convert text into URL-friendly slugs</td>
                        <td class="p-3">
                            <a href="{{ route('slugifier.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Open
                            </a>
                        </td>
                    </tr>

                    {{-- File Uploader --}}
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 font-medium">Chunked File Uploader (Incompleted)</td>
                        <td class="p-3 text-gray-600">Upload large files in chunks without timeout</td>
                        <td class="p-3">
                            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Open
                            </a>
                        </td>
                    </tr>

                    {{-- URL Shortener --}}
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 font-medium">URL Shortener</td>
                        <td class="p-3 text-gray-600">Shorten any URL quickly</td>
                        <td class="p-3">
                            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Open
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- Performance Table --}}
    <section id="performance" class="mt-12">
        <h3 class="text-2xl font-semibold mb-4">Performance Demos</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left p-3 border-b">Demo</th>
                        <th class="text-left p-3 border-b">Description</th>
                        <th class="text-left p-3 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    {{-- Lazy Loading --}}
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 font-medium">Lazy vs Eager Loading</td>
                        <td class="p-3 text-gray-600">See how eager loading saves database queries</td>
                        <td class="p-3">
                            <a href="#" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                View
                            </a>
                        </td>
                    </tr>

                    {{-- N+1 Detector --}}
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 font-medium">N+1 Detector</td>
                        <td class="p-3 text-gray-600">Detect inefficient queries in real time</td>
                        <td class="p-3">
                            <a href="#" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
