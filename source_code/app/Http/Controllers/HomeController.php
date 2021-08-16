<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
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

        return view('frontend.home', compact('jobs', 'cities', 'categories'));
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
        return view('frontend.jobs-list', compact('jobs'));
    }
}
