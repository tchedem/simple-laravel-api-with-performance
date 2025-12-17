<?php

namespace App\Http\Controllers;

use App\Models\UploadedFile;

class FileUploaderController extends Controller
{
    public function index()
    {
        $files = UploadedFile::latest()->get();

        return view('pages.tools.uploaded-files', compact('files'));
        return view('uploaded-files', compact('files'));
    }

    public function create()
    {
        // return view('pages.tools.upload-file');
        return view('upload-file');
    }
}
