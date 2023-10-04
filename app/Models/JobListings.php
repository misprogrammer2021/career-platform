<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListings extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = ['job_title', 'company_name', 'job_description', 'location'];
}
