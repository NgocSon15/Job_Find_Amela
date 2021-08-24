<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\JobRequest;
use App\Models\Category;
use App\Models\Position;
use App\Models\Company;
use App\Models\Skill;
use App\Models\City;

class JobController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $jobs = Job::paginate(5);
        return view('admin.job.list', compact('jobs', 'cities'));
    }

    public function activeJob(Request $request)
    {
        $job_id = $request->id;
        $job = Job::findOrFail($job_id);
        $job->status = 1;
        $job->save();
    }

    public function lockJob(Request $request)
    {
        $job_id = $request->id;
        $job = Job::findOrFail($job_id);
        $job->status = 2;
        $job->save();
    }

    public function suggestJob(Request $request)
    {
        $job_id = $request->id;
        $job = Job::findOrFail($job_id);
        $job->is_suggest = 1;
        $job->save();
    }

    public function notSuggestJob(Request $request)
    {
        $job_id = $request->id;
        $job = Job::findOrFail($job_id);
        $job->is_suggest = 0;
        $job->save();
    }

    public function feCreate()
    {
        $categories = Category::all();
        $positions = Position::all();
        $skills = Skill::all();
        return view('frontend.job.create', compact('categories', 'positions', 'skills'));
    }

    public function create()
    {
        $categories = Category::all();
        $positions = Position::all();
        $skills = Skill::all();
        $companies = Company::all();
        return view('admin.job.create', compact('companies', 'categories', 'positions', 'skills'));
    }

    public function store(JobRequest $request)
    {
        $max_id = DB::select("SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'job_find' AND   TABLE_NAME   = 'jobs'");
        $max_id = $max_id[0]->AUTO_INCREMENT;
        $job = new Job();

        $job->company_id = $request->input('company_id');
        $job->job_title = $request->input('job_title');
        $job->job_description = $request->input('job_description');
        $job->skill_id = implode(',',$request->skill_id);
        $company = Company::findOrFail($job->company_id)->first();
        $job->job_code = $company->company_code . $max_id;
        $job->category_id = $request->input('category_id');
        $job->min_salary = $request->input('min_salary');
        $job->max_salary = $request->input('max_salary');
        $job->work_location = $request->input('work_location');
        $job->job_type = $request->input('job_type');
        $job->experiences = $request->input('experiences');
        $job->expiration = $request->input('expiration');
        $job->position_id = $request->input('position_id');
        $job->gender = $request->input('gender');
        $job->quantity = $request->input('quantity');
        $job->save();
        $company->total_jobs += 1;
        $company->save();

        Session::flash('success', 'Thêm mới thành công');
        if (Session::get('user')->role == 'admin')
        {
            return redirect()->route('admin.job.index');
        } else {
            return redirect()->route('frontend.home');
        }

    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();
        $positions = Position::all();
        $skills = Skill::all();
        $companies = Company::all();
        return view('admin.job.edit', compact('job', 'companies', 'categories', 'positions', 'skills'));
    }

    public function feEdit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();
        $positions = Position::all();
        $skills = Skill::all();
        $job_skills = explode(',', $job->skill_id);
        return view('frontend.job.edit', compact('job', 'categories', 'positions', 'skills', 'job_skills'));
    }

    public function update(JobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->company_id = $request->input('company_id');
        $job->job_title = $request->input('job_title');
        $job->job_description = $request->input('job_description');
        $job->skill_id = implode(',',$request->skill_id);
        $job->category_id = $request->input('category_id');
        $job->min_salary = $request->input('min_salary');
        $job->max_salary = $request->input('max_salary');
        $job->work_location = $request->input('work_location');
        $job->job_type = $request->input('job_type');
        $job->experiences = $request->input('experiences');
        $job->expiration = $request->input('expiration');
        $job->position_id = $request->input('position_id');
        $job->gender = $request->input('gender');
        $job->quantity = $request->input('quantity');
        $job->save();

        Session::flash('success', 'Sửa thông tin thành công');
        if (Session::get('user')->role == 'admin')
        {
            return redirect()->route('admin.job.index');
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job.delete', compact('job'));
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        $company = $job->company;
        $company->total_jobs -= 1;
        $company->save();

        Session::flash('success', 'Xóa thành công');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $cities = City::all();
        $keyWord = $request->keyWord;
        $keyWord = explode(' ', $keyWord);
        $newKeyWord = '%';
        foreach($keyWord as $word){
            $newKeyWord .= "$word%";
        }
       $city_id = $request->city_id;
        $jobs = Job::leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
                ->where([
                    ['city_id', 'like', "%$city_id%"],
                    ['job_title', 'like', $newKeyWord],
                    ])
                    ->orWhere([
                    ['city_id', 'like', "%$city_id%"],
                    ['fullname', 'like', $newKeyWord],
                        ])
                    ->select('jobs.*', 'companies.fullname', 'companies.id as com_id', 'city_id')
                    ->paginate(10);
        return view('admin.job.list', compact('jobs', 'cities'));
    }


}
