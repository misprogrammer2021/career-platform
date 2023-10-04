<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListings;
class JobListingController extends Controller
{
    public function index() {
        return JobListings::all();
    }

    public function store(Request $request) {
        return JobListings::create($request->all());
    }

    public function show($id) {
        return JobListings::find($id);
    }

    public function update(Request $request, $id) {
        $job = JobListings::findOrFail($id);
        $job->update($request->all());
        
        return $job;
    }

    public function delete(Request $request, $id) {
        $job = JobListings::findOrFail($id);
        $job->delete();

        return 204;
    }
}
