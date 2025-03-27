<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chunked File Upload Test</title>
</head>
<body>
    <h2>Chunked File Upload</h2>
    <input type="file" id="fileInput">
    <button onclick="startUpload()">Upload</button>
    <p id="status"></p>

    <button><a href="{{ route('home') }}">Back</a></button>

    <script>
        const apiUrl = 'http://127.0.0.1:8000/api/upload'; // Change this to your API URL
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
    </script>
</body>
</html>
