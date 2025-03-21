<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugifierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('slugifier');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $default_separator = "-";

        $separator = $request->separator ?? $default_separator;

        $slugify_string = Str::slug($request->string, $separator);

        // return view('slugify-result', ['slugify_string' => $slugify_string]);
        return view('slugifier', ['slugify_string' => $slugify_string]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
