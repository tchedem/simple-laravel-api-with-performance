@extends('layouts.app')

@section('title', 'Uploaded Files')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Uploaded Files</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Filename</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Size (MB)</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Uploaded at</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($files as $file)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $file->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $file->original_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ round($file->size / 1024 / 1024, 2) }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 capitalize">{{ $file->status }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $file->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">No uploaded files yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('upload.create') }}"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
           Upload a new file
        </a>
    </div>
</div>
@endsection
