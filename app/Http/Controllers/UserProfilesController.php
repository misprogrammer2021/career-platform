<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Models\UserProfiles;
use App\Http\Requests\StoreUserProfilesRequest;

class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userprofiles = UserProfiles::paginate(15);
        return response()->json([
            'status' => 'OK',
            'data' => $userprofiles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserProfilesRequest $request)
    {
    
        $validated = $request->validated();
        UserProfiles::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = UserProfiles::findOrFail($id);
        return response()->json([
            'status' => 'OK',
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserProfilesRequest $request, int $id)
    {
        $user = UserProfiles::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->resume = $request->resume;
        $user->skills = $request->skills;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = UserProfiles::findOrFail($id);
        $user->delete();
    }
}
