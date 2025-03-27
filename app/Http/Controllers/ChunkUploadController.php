<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChunkUploadController extends Controller
{

    /**
     * Handle a single chunk upload
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadChunk(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'file' => 'required|file',
                'chunk_index' => 'required|integer',
                'total_chunks' => 'required|integer',
                'filename' => 'required|string',
                'upload_id' => 'required|string',
            ]);

            $file = $request->file('file');
            $chunkIndex = $request->input('chunk_index');
            $totalChunks = $request->input('total_chunks');
            $filename = $request->input('filename');
            $uploadId = $request->input('upload_id');

            // Store chunk
            $chunkName = "chunk_{$chunkIndex}";
            $chunkPath = "chunks/{$uploadId}/{$chunkName}";

            // Ensure the directory exists
            Storage::makeDirectory("chunks/{$uploadId}");

            // Store the chunk
            Storage::putFileAs("chunks/{$uploadId}", $file, $chunkName);

            return response()->json([
                'success' => true,
                'message' => "Chunk {$chunkIndex} uploaded successfully",
                'chunk_index' => $chunkIndex
            ]);

        } catch (\Exception $e) {
            Log::error('Chunk upload error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error uploading chunk: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check which chunks have been uploaded
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkStatus(Request $request)
    {
        $request->validate([
            'upload_id' => 'required|string'
        ]);

        $uploadId = $request->input('upload_id');
        $chunksDir = "chunks/{$uploadId}";

        if (!Storage::exists($chunksDir)) {
            return response()->json([
                'chunks_present' => []
            ]);
        }

        $files = Storage::files($chunksDir);
        $chunksPresent = [];

        foreach ($files as $file) {
            // Extract chunk number from filename (chunk_X)
            if (preg_match('/chunk_(\d+)$/', $file, $matches)) {
                $chunksPresent[] = (int) $matches[1];
            }
        }

        return response()->json([
            'chunks_present' => $chunksPresent
        ]);
    }

    /**
     * Merge chunks into final file
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function mergeChunks(Request $request)
    {
        try {
            // Set unlimited execution time for merging
            set_time_limit(0);

            $request->validate([
                'upload_id' => 'required|string',
                'filename' => 'required|string',
                'total_chunks' => 'required|integer',
            ]);

            $uploadId = $request->input('upload_id');
            $filename = $request->input('filename');
            $totalChunks = $request->input('total_chunks');

            // Create safe filename
            $safeFilename = Str::slug(pathinfo($filename, PATHINFO_FILENAME)) . '.' . pathinfo($filename, PATHINFO_EXTENSION);

            // Final path
            $finalDir = 'uploads';
            $finalPath = "{$finalDir}/{$safeFilename}";

            // Ensure uploads directory exists
            Storage::makeDirectory($finalDir);

            // Open final file
            $finalFilePath = Storage::path($finalPath);
            $finalFile = fopen($finalFilePath, 'wb');

            // Check all chunks are present
            $chunksDir = "chunks/{$uploadId}";
            for ($i = 0; $i < $totalChunks; $i++) {
                $chunkPath = Storage::path("{$chunksDir}/chunk_{$i}");

                if (!file_exists($chunkPath)) {
                    fclose($finalFile);

                    return response()->json([
                        'success' => false,
                        'message' => "Chunk {$i} is missing. Upload incomplete."
                    ], 400);
                }
            }

            // Merge chunks
            for ($i = 0; $i < $totalChunks; $i++) {
                $chunkPath = Storage::path("{$chunksDir}/chunk_{$i}");
                $chunkContent = file_get_contents($chunkPath);
                fwrite($finalFile, $chunkContent);

                // Free memory
                unset($chunkContent);
            }

            fclose($finalFile);

            // Clean up chunks
            Storage::deleteDirectory($chunksDir);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded and merged successfully',
                'file' => [
                    'name' => $safeFilename,
                    'path' => $finalPath,
                    'url' => Storage::url($finalPath),
                    'size' => Storage::size($finalPath)
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Chunk merge error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error merging chunks: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate a new upload ID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function initUpload()
    {
        $uploadId = (string) Str::uuid();

        return response()->json([
            'upload_id' => $uploadId
        ]);
    }

}
