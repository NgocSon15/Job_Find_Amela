<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function FECreate()
    {
        return view('frontend.job.create');
    }
}