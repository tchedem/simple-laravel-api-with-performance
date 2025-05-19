<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\Models\TestSomeQueueFeature;
use Illuminate\Http\Request;

class TestSomeQueueFeatureController extends Controller
{

    public function runQueueForSixtySeconds() {

        $podcast = 66;

        // TestJob::dispatch($podcast)->onQueue('default');
        // TestJob::dispatch($podcast)->onQueue('default');
        TestJob::dispatch($podcast)->onQueue('test-queue');

        // ProcessPodcast::dispatch($podcast);

        return response()->json([
            "he" => "d"
        ]);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(TestSomeQueueFeature $testSomeQueueFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestSomeQueueFeature $testSomeQueueFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestSomeQueueFeature $testSomeQueueFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestSomeQueueFeature $testSomeQueueFeature)
    {
        //
    }
}
