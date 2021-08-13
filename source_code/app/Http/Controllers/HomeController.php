<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function getHome()
    {
        $jobs = Job::limit(5)->get();

        return view('home', compact('jobs'));
    }
}
