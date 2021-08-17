<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\JobRequest;
use App\Models\Category;
use App\Models\Position;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('admin.job.list', compact('jobs'));
    }

    public function feCreate()
    {
        $categories = Category::all();
        $positions = Position::all();
        return view('frontend.job.create', compact('categories', 'positions'));
    }

    public function create()
    {
        return view('admin.job.create');
    }

    public function store(JobRequest $request)
    {
        $job = new Job();
        $job->company_id = $request->input('company_id');
        $job->job_title = $request->input('job_title');
        $job->job_description = $request->input('job_description');
        $job->skill_id = $request->input('skill_id');
        $job->job_code = $request->input('job_code');
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
        $job->status = $request->input('status');
        $job->is_hot = $request->input('is_hot');
        $job->is_suggest = $request->input('is_suggest');
        $job->view = $request->input('view');
        $job->reference_ids = $request->input('reference_ids');

        $job->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('admin.job.index');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job.edit', compact('job'));
    }

    public function update(JobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->company_id = $request->input('company_id');
        $job->job_title = $request->input('job_title');
        $job->job_description = $request->input('job_description');
        $job->skill_id = $request->input('skill_id');
        $job->job_code = $request->input('job_code');
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
        $job->status = $request->input('status');
        $job->is_hot = $request->input('is_hot');
        $job->is_suggest = $request->input('is_suggest');
        $job->view = $request->input('view');
        $job->reference_ids = $request->input('reference_ids');
        $job->save();

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('admin.job.index');
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

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('admin.job.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.job.index');
        }
        $jobs = Job::where('job_title', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return view('admin.job.list', compact('jobs', 'keyword'));
    }
}
