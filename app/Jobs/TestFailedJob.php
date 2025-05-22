<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class TestFailedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Laravel will try this job only once before marking as failed
    public $tries = 3; // Default is usually 1
    public $backoff = 0; // Delay (in seconds) between attempts
    
    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            throw new Exception('There is an error here.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception): void
    {
        Log::channel('job_failures')->error('Custom Failed Job Logging', [
            'job' => self::class,
            'message' => $exception->getMessage(),
        ]);
    }
}
