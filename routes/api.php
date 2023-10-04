<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/job_listings', [JobListingController::class, 'index']);
Route::get('/job_listings/{id}', [JobListingController::class, 'show']);
Route::post('/job_listings', [JobListingController::class, 'store']);
Route::put('/job_listings/{id}', [JobListingController::class, 'update']);
Route::delete('/job_listings/{id}', [JobListingController::class, 'delete']);
