<?php

namespace App\Jobs;

use App\Models\Submission;
use App\Events\SubmissionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private $submissionData
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $submission = Submission::create($this->submissionData);
        SubmissionProcessed::dispatch($submission);
    }
}
