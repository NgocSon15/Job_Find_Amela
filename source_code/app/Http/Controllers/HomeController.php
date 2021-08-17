<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;

class HomeController extends Controller
{
    public function getHome()
    {
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();
        $most_hired_companies = Company::orderByDesc('total_jobs')->limit(8)->get();

        return view('frontend.home', compact('jobs', 'most_hired_companies'));
    }
}
