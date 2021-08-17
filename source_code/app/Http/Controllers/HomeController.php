<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;

class HomeController extends Controller
{
    public function getHome()
    {
        $cities = City::all();
        $categories = Category::all();
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();
        $most_hired_companies = Company::orderByDesc('total_jobs')->limit(8)->get();

        return view('frontend.home', compact('jobs', 'most_hired_companies', 'cities', 'categories'));

    }

    public function homeSearch(Request $request)
    {
        $request->validate([
          'city_id' => 'nullable|exists:cities,city_id',
          'category_id' => 'exists:categories,cat_id',
        ]);
        $keyWord = $request->keyWord;
        $keyWord = explode(' ', $keyWord);
        $newKeyWord = '%';
        foreach($keyWord as $word){
            $newKeyWord .= "$word%";
        }
        $category_id = $request->category_id;

        $city_id = $request->city_id;
        $companies = Company::where('city_id', $city_id)->get();
        if($city_id == null){
            $companies = Company::all();
        }
        $company_ids = [];
        foreach($companies as $company){
            $company_ids[] = $company->company_id;
        }
        $jobs = Job::whereIn('company_id', $company_ids)
                    ->where('job_title', 'like', $newKeyWord)
                    ->where('category_id', 'like', "%$category_id%")
                    ->paginate(20);
        return view('frontend.jobs-listing', compact('jobs'));
    }

    public function getListJob()
    {
        Carbon::setLocale('vi');
        $jobs = Job::paginate(5);
        $skills = Skill::all();
        $now = Carbon::now();
        return view('frontend.job.job_listing', compact('jobs', 'now', 'skills'));
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
        return view('frontend.job.job_listing', compact('jobs', 'now', 'skills'));
    }

    public function getDetailJob($id)
    {
        $job = Job::where('id', $id)->firstOrFail();
        return view('frontend.job.job_detail', compact('job'));
    }


}
