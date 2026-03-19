<?php

namespace App\Http\Controllers;

use App\Models\MagainContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChunkUploadController extends Controller
{

    public function index()
    {
        return view('chunk-upload');
    }

    public function store(Request $request)
    {
        $chunk = $request->file('file');
        $originalName = $request->input('name');       // original file name
        $chunkIndex   = $request->input('chunk_index', 0);

        $allowed = ['mp4', 'webm', 'gif'];

        $extension = $chunk->getClientOriginalExtension();

        if (!in_array(strtolower($extension), $allowed)) {
            return response()->json(['success' => false, 'message' => 'Invalid file type'], 400);
        }

        // Sanitize filename for storage
        $safeName = md5($originalName);

        // Path for storing chunks
        $chunkDir = storage_path("app/chunks/$safeName");
        if (!file_exists($chunkDir)) {
            mkdir($chunkDir, 0777, true);
        }

        // Store chunk as 0.part, 1.part, etc.
        $chunk->move($chunkDir, $chunkIndex . '.part');

        return response()->json([
            'success' => true,
            'chunk_index' => $chunkIndex,
            'ext' => $extension,
        ]);
    }

    public function merge(Request $request)
    {
        $fileName    = $request->file_name;
        $totalChunks = $request->total_chunks;
        $magazineId  = $request->magazine;

        $chunkPath   = storage_path("app/chunks/$fileName");
        $finalPath   = storage_path("app/public/uploads/$fileName");
        $ext         = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!file_exists(dirname($finalPath))) {
            mkdir(dirname($finalPath), 0777, true);
        }

        $output = fopen($finalPath, "ab");

        for ($i = 0; $i < $totalChunks; $i++) {
            $chunkFile = $chunkPath . '/' . $i . '.part';

            if (!file_exists($chunkFile)) {
                continue; // skip missing chunks
            }

            // Use stream copy for memory efficiency
            $in = fopen($chunkFile, 'rb');
            stream_copy_to_stream($in, $output);
            fclose($in);

            // Remove chunk
            unlink($chunkFile);
        }

        fclose($output);

        // Remove chunk folder
        if (is_dir($chunkPath)) {
            rmdir($chunkPath);
        }

        // Insert **once** into DB
        MagainContent::create([
            'magazine_id' => $magazineId,
            'url'         => asset('storage/uploads/' . $fileName),
            'path'        => "uploads/$fileName",
            'ext'         => $ext,
            'index_number' => 1,
            'is_published' => 1
        ]);

        return response()->json([
            'success' => true,
            'url'     => asset('storage/uploads/' . $fileName)
        ]);
    }
}
