<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Jobs\ProcessSubmission;

class SubmissionController extends Controller
{
    public function submit(SubmissionRequest $request)
    {
        ProcessSubmission::dispatch($request->all());

        return response()->json(['message' => 'Submission processed successfully'], 200);
    }
}
