<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Customer;
use App\Models\Experience;
use App\Models\CompanySize;
use App\Models\Field;

class HomeController extends Controller
{
    public function getHome()
    {
        $cities = City::all();
        $categories = Category::all();
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();
        $most_hired_companies = Company::orderByDesc('total_jobs')->limit(8)->get();
        $skills = Skill::all();
        return view('frontend.home', compact('jobs', 'most_hired_companies', 'cities', 'categories', 'skills'));

    }

    public function homeSearch(Request $request)
    {
        $request->validate([
          'city_id' => 'nullable|exists:cities,city_id',
          'category_id' => 'exists:categories,cat_id',
        ]);
        $skills = Skill::all();
        $keyWord = $request->keyWord;
        $keyWord = explode(' ', $keyWord);
        $newKeyWord = '%';
        foreach($keyWord as $word){
            $newKeyWord .= "$word%";
        }
        $category_id = $request->category_id;

        $city_id = $request->city_id;
       $city = City::all();
        $jobs = Job::leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
                                    ->where([
                                        ['category_id', 'like', "%$category_id%"],
                                        ['city_id', 'like', "%$city_id%"],
                                        ['job_title', 'like', $newKeyWord],
                                    ])
                                    ->orWhere([
                                        ['category_id', 'like', "%$category_id%"],
                                        ['city_id', 'like', "%$city_id%"],
                                        ['fullname', 'like', $newKeyWord],
                                    ])
                                    ->select('jobs.*', 'companies.fullname', 'companies.id as com_id', 'city_id')
                                        ->paginate(20);
        Carbon::setLocale('vi');
        $now = Carbon::now();
        return view('frontend.job.job_listing', compact('jobs', 'skills', 'now', 'city'));
    }

    public function getListJob()
    {
        Carbon::setLocale('vi');
        $jobs = Job::paginate(20);
        $skills = Skill::all();
        $city = City::all();
        $now = Carbon::now();
        return view('frontend.job.job_listing', compact('jobs', 'now', 'skills', 'city'));
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

        if($request->input('salary') != null)
        {

            $salary = $request->input('salary');
            $q->whereBetween('min_salary', [$salary, $salary + 1000]);
        }

        if($request->input('location') != null)
        {
            $q->join('companies', 'jobs.company_id', '=', 'companies.id')->where('companies.city_id', $request->input('location'));
        }

        $jobs = $q->paginate(5);
        $skills = Skill::all();
        $city = City::all();
        Carbon::setLocale('vi');
        $now = Carbon::now();
        return view('frontend.job.job_listing', compact('jobs', 'now', 'skills', 'city'));
    }

    public function getDetailJob($id)
    {
        $skills = Skill::all();
        $job = Job::where('id', $id)->firstOrFail();
        $job_recommend = Job::where('is_suggest', 1)->get();
        return view('frontend.job.job_detail', compact('job','job_recommend', 'skills'));
    }

    public function getProfile()
    {
//        dd(session()->get('user')->experience->exp_year);
        $id = session()->get('user')->user_id;
        if (session()->get('user')->role == 'customer')
        {
            $exp = Experience::where('id', $id)->firstOrFail();

            return view('frontend.user.user-profile', compact('exp'));
        }

        $cities = City::all();
        $companySizes = CompanySize::all();
        $fields = Field::all();
        $company = session()->get('user')->company;
        return view('frontend.user.company-information', compact('cities', 'companySizes', 'fields', 'company'));

    }
    public function updateProfileUser(Request $request)
    {
        $id = session()->get('user')->user_id;
        $exp = Experience::where('id', $id)->firstOrFail();
//        dd($user->exp);
        $exp->exp_year = $request->exp;
        $exp->content = $request->process;
        $exp->save();
        Session::flash('success', 'Update experience success');
        return view('frontend.user.user-profile', compact('exp'));
//        return redirect()->route('frontend.user-profile');

    }
}
