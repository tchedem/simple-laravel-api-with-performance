<?php

namespace App\Http\Controllers;

use App\Models\Stress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function stressMethod (Request $request) {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'stress_time' => 'required|integer|min:1|max:100', // Validate that stress_time is a positive integer
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $preExecDate = date('Y-m-d H:i:s');

        // Get the stress time from the request
        $stressTime = $request->stress_time;

        // Construct the command
        $command = "stress --cpu 1 --timeout {$stressTime}"; // Customize as per your needs

        // Execute the command
        exec($command, $output, $return_var);

        $postExecDate = date('Y-m-d H:i:s');

        // Return the command output and status
        if ($return_var === 0) {
            return response()->json([
                'success' => true,
                'pre execution date' => $preExecDate,
                'post execution date' => $postExecDate,
                'output' => $output]
            );
        } else {
            return response()->json(['success' => false, 'error' => 'Command execution failed.'], 500);
        }

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
    public function show(Stress $stress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stress $stress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stress $stress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stress $stress)
    {
        //
    }
}
