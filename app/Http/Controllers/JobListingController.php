<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListings;
class JobListingController extends Controller
{
    // TODO - Kalau data banyak , macam mana nak optimzie code ni ?
    public function index() {
        return JobListings::all();
    }

    // TODO - Macam mana nak make sure data yang submit betul , dan triggera apa2 error kalau takda data submit ?
    public function store(Request $request) {
        return JobListings::create($request->all());
    }

    // TODO - Kalau data takda apa jadi ? Macam mana nak tahu data ada takda ?
    public function show($id) {
        return JobListings::find($id);
    }

    public function update(Request $request, $id) {
        $job = JobListings::findOrFail($id);
        $job->update($request->all());

        return $job;
    }

    // TODO - Kau sure ni dia return response http code 204 :) ?
    public function delete(Request $request, $id) {
        $job = JobListings::findOrFail($id);
        $job->delete();

        return 204;
    }
}
