<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function saveMedia (Request $request) {

        sleep(180);

        if ( $request->hasFile('files') )  {

            $files = $request->file('files') ?? [];

            foreach ($files as $file) {
                # code...

                $name = $file->hashName();
                $extension = $file->extension();
                // $contents = $file;

                Storage::disk('media')->put($name, file_get_contents($file), 'public');

                // $file->store('media');
            }
        }

        return response()->json([
            'data' => '',
            'message' => 'Files saved'
        ]);

        dd($request->hasFile('files'));


    }

}
