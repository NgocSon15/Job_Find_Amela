<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use Carbon\Carbon;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function getHome()
    {
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();
        return view('frontend.home', compact('jobs'));
    }

    public function getListJob()
    {
        Carbon::setLocale('vi');
        $jobs = Job::paginate(5);
        $skills = Skill::all();
        $now = Carbon::now();
        return view('job_listing', compact('jobs', 'now', 'skills'));

    }
    public function filterJob(Request $request)
    {

        $q = Job::query();

        if($request->input('skill') != null)
        {
            $q->where('skill_id','=', $request->input('skill'));
        }

        if($request->input('time') != null)
        {
            $q->where('job_type','=', $request->input('time'));
        }
        if($request->input('exp') != null)
        {
            if($request->input('exp') == 3){
                $q->where('experiences','>=', $request->input('exp'));
            }else{
                $q->where('experiences','=', $request->input('exp'));
            }
        }

        $jobs = $q->paginate(5);
        $skills = Skill::all();
        Carbon::setLocale('vi');
        $now = Carbon::now();
        return view('job_listing', compact('jobs', 'now', 'skills'));

    }


}
