<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\JobRequest;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('admin.job.list', compact('jobs'));
    }

    public function FECreate()
    {
        return view('frontend.job.create');
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
        $job->category_id = $request->input('category_id');
        $job->min_salary = $request->input('min_salary');
        $job->max_salary = $request->input('max_salary');
        $job->work_location = $request->input('work_location');
        $job->job_level = $request->input('job_level');
        $job->experiences = $request->input('experiences');
        $job->expiration = $request->input('expiration');
        $job->position_type = $request->input('position_type');
        $job->gender = $request->input('gender');
        $job->status = $request->input('status');
        $job->hot_job = $request->input('hot_job');
        $job->is_suggest = $request->input('is_suggest');
        $job->view = $request->input('view');

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
        $job->category_id = $request->input('category_id');
        $job->min_salary = $request->input('min_salary');
        $job->max_salary = $request->input('max_salary');
        $job->work_location = $request->input('work_location');
        $job->job_level = $request->input('job_level');
        $job->experiences = $request->input('experiences');
        $job->expiration = $request->input('expiration');
        $job->position_type = $request->input('position_type');
        $job->gender = $request->input('gender');
        $job->status = $request->input('status');
        $job->hot_job = $request->input('hot_job');
        $job->is_suggest = $request->input('is_suggest');
        $job->view = $request->input('view');
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
        // $keyword = $request->input('keyword');
        // if (!$keyword) {
        //     return redirect()->route('job.index');
        // }
        // $jobs = Job::where('job_name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        // return view('job.list', compact('jobs', 'keyword'));
    }
}
