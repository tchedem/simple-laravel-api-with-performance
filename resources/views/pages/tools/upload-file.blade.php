@extends('layouts.app')

@section('title', 'Chunked File Upload')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

        <h2 class="text-2xl font-semibold mb-4 text-gray-800">
            Chunked File Upload
        </h2>

        <!-- File input -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Select a file
            </label>

            <input type="file" id="fileInput"
                class="block w-full text-sm text-gray-700
                   file:mr-4 file:py-2 file:px-4
                   file:rounded file:border-0
                   file:text-sm file:font-semibold
                   file:bg-blue-600 file:text-white
                   hover:file:bg-blue-700">
        </div>

        <!-- Upload button -->
        <button onclick="startUpload()"
            class="w-full bg-blue-600 text-white py-2 rounded
               hover:bg-blue-700 transition">
            Upload
        </button>

        <!-- Status -->
        <p id="status" class="mt-4 text-sm text-gray-600 font-mono"></p>

        <!-- Actions -->
        <div class="mt-6 flex justify-between text-sm">
            <a href="{{ route('upload.index') }}" class="text-blue-600 hover:underline">
                View uploaded files
            </a>

            <a href="{{ route('home') }}" class="text-gray-600 hover:underline">
                Back
            </a>
        </div>

        <!--
            JS logic:
            - init upload
            - send chunks
            - merge chunks
            API endpoints already working
        -->

    </div>
@endsection


@push('scripts')
    {{-- <script>
        const apiUrl = "{{ env('APP_URL', 'http://127.0.0.1:8000') }}/api/upload";
        // const chunkSize = 1024 * 1024; // 1MB chunks in Bytes
        const chunkSize = 10 * 1024 * 1024; // 10MB chunks in Bytes

        let uploadId = '';

        async function startUpload() {
            const fileInput = document.getElementById('fileInput');
            if (!fileInput.files.length) {
                alert('Please select a file!');
                return;
            }
            const file = fileInput.files[0];
            const totalChunks = Math.ceil(file.size / chunkSize);

            // Initialize Upload
            const initRes = await fetch(`${apiUrl}/init`, { method: 'POST' });
            const initData = await initRes.json();
            uploadId = initData.upload_id;

            for (let i = 0; i < totalChunks; i++) {
                const chunk = file.slice(i * chunkSize, (i + 1) * chunkSize);
                const formData = new FormData();
                formData.append('file', chunk);
                formData.append('chunk_index', i);
                formData.append('total_chunks', totalChunks);
                formData.append('filename', file.name);
                formData.append('upload_id', uploadId);

                await fetch(`${apiUrl}/chunk`, { method: 'POST', body: formData });
                document.getElementById('status').innerText = `Uploaded chunk ${i + 1}/${totalChunks}`;
            }

            // Merge Chunks
            const mergeRes = await fetch(`${apiUrl}/merge`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ upload_id: uploadId, filename: file.name, total_chunks: totalChunks })
            });
            const mergeData = await mergeRes.json();
            document.getElementById('status').innerText = mergeData.message;
        }
    </script> --}}

    <script>
        // const apiUrl = "{{ config('app.url') }}/api/upload";
        const apiUrl = "/api/upload";
        const chunkSize = 10 * 1024 * 1024; // 10MB chunks

        let uploadId = '';

        async function startUpload() {
            const fileInput = document.getElementById('fileInput');
            if (!fileInput.files.length) {
                alert('Please select a file!');
                return;
            }
            const file = fileInput.files[0];
            const totalChunks = Math.ceil(file.size / chunkSize);

            // Initialize Upload
            const initRes = await fetch(`${apiUrl}/init`, {
                method: 'POST'
            });
            const initData = await initRes.json();
            uploadId = initData.upload_id;

            for (let i = 0; i < totalChunks; i++) {
                const chunk = file.slice(i * chunkSize, (i + 1) * chunkSize);
                const formData = new FormData();
                formData.append('file', chunk);
                formData.append('chunk_index', i);
                formData.append('total_chunks', totalChunks);
                formData.append('filename', file.name);
                formData.append('upload_id', uploadId);

                await fetch(`${apiUrl}/chunk`, {
                    method: 'POST',
                    body: formData
                });
                document.getElementById('status').innerText = `Uploaded chunk ${i + 1}/${totalChunks}`;
            }

            // Merge Chunks
            const mergeRes = await fetch(`${apiUrl}/merge`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    upload_id: uploadId,
                    filename: file.name,
                    total_chunks: totalChunks
                })
            });
            const mergeData = await mergeRes.json();
            document.getElementById('status').innerText = mergeData.message;
        }
    </script>
@endpush
