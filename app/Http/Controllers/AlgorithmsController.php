<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgorithmsController extends Controller
{
    //
    public function getDfs(Request $request) {
        //
        return response()->json([
            'name' => 'BFS - Breath First Search',
            'gist' => '',
            'read_more' => ''
        ]);
    }

    public function postDfs()
    {
        // $payload = request()->all();
        // $graph = $payload['graph'] ?? [];
        // $start = $payload['start'] ?? null;

        // if (empty($graph) || $start === null) {
        //     return response()->json([
        //         'error' => 'Invalid input. Expect JSON with "graph" (adjacency list) and "start" node.'
        //     ], 400);
        // }

        // $visited = [];
        // $order = [];
        // $stack = [$start];

        // while (!empty($stack)) {
        //     $node = array_pop($stack);
        //     if (isset($visited[$node])) {
        //         continue;
        //     }
        //     $visited[$node] = true;
        //     $order[] = $node;

        //     if (!empty($graph[$node]) && is_array($graph[$node])) {
        //         // Push neighbors in reverse order so DFS visits them in the provided order
        //         $neighbors = array_reverse($graph[$node]);
        //         foreach ($neighbors as $neighbor) {
        //             if (!isset($visited[$neighbor])) {
        //                 $stack[] = $neighbor;
        //             }
        //         }
        //     }
        // }

        // return response()->json(['order' => $order]);
    }
}
