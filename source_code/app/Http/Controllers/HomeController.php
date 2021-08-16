<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function getHome()
    {
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();

        return view('frontend.home', compact('jobs'));
    }
}
