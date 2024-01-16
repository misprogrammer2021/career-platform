<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JobListings;

class JobListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $joblistings = JobListings::paginate(15);
        return response()->json([
            'status' => 'OK',
            'data' => $joblistings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'job_title' => 'required|max:50',
                'company_name' => 'required',
                'job_description' => 'required',
                'location' => 'required|max:50'
            ],
            [
                'job_title.required' => 'Job title field is required.',
                'company_name.required' => 'Company name field is required.',
                'job_description.required' => 'Job description field is required.', 
                'location.required' => 'Location field is required.'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'ERROR',
                'data' => implode("; ", $validator->messages()->all()) //$validator->messages()->all()
            ], 500);
        }

        JobListings::create([
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'job_description' => $request->job_description,
            'location' => $request->location,
        ]);

        return response()->json([
            'status' => 'OK',
            'data' => null
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $job = JobListings::where('id', $id)->first();
        return response()->json([
            'status' => 'OK',
            'data' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $job = JobListings::where('id', $id)->first();
        if (empty($job)) {
            return response()->json([
                'message' => 'Job detail not found.'
            ], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'job_title' => 'required|max:50',
                'company_name' => 'required',
                'job_description' => 'required',
                'location' => 'required|max:50'
            ],
            [
                'job_title.required' => 'Job title field is required.',
                'company_name.required' => 'Company name field is required.',
                'job_description.required' => 'Job description field is required.', 
                'location.required' => 'Location field is required.'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'ERROR',
                'data' => implode("; ", $validator->messages()->all())
            ], 500);
        }

        $job->job_title = $request->job_title;
        $job->company_name = $request->company_name;
        $job->job_description = $request->job_description;
        $job->location = $request->location;
        $job->save();

        return response()->json([
            'status' => 'OK',
            'data' => null
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $job = JobListings::where('id', $id)->delete();
        if (empty($job)) {
            return response()->json([
                'message' => 'Job not found.',
            ], 500);
        }
    }
}
