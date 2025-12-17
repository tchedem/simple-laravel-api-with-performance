<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugifierController extends Controller
{
    public function create(Request $request)
    {
        return view('pages.tools.slugifier');
    }

    public function store(Request $request)
    {
        $default_separator = '-';
        $separator = $request->separator ?? $default_separator;

        $slugify_string = Str::slug($request->string, $separator);

        return view('pages.tools.slugifier', [
            'slugify_string' => $slugify_string
        ]);
    }
}
