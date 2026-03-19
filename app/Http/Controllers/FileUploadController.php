<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index($id)
    {
        return view('auth.admin.upload', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:102400' // 100MB
        ]);

        $uploadedFiles = [];

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $path = $file->store('uploads', 'public');

                $uploadedFiles[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path
                ];
            }
        }

        return response()->json([
            'success' => true,
            'files' => $uploadedFiles
        ]);
    }
}