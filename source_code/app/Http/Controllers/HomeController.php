<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\City;
use App\Models\Company;

class HomeController extends Controller
{
    public function getHome()
    {
        $cities = City::all();
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();

        return view('frontend.home', compact('jobs', 'cities'));
    }

    public function homeSearch(Request $request)
    {
        $keyWord = $request->keyWord;
        $keyWord = explode(' ', $keyWord);
        $newKeyWord = '%';
        foreach($keyWord as $word){
            $newKeyWord .= "$word%";
        }
        $city_id = $request->city_id;
        $companies = Company::where('city_id', $city_id)->get();
        $company_ids = [];
        foreach($companies as $company){
            $company_ids[] = $company->company_id;
        }
        $jobs = Job::whereIn('company_id', $company_ids)
                    ->where('job_title', 'like', $newKeyWord)
                    ->paginate(20);
        // dd($jobs[1]);
        return view('frontend.jobs-list', compact('jobs'));
    }
}
