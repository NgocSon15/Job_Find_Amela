<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Job;
use Carbon\Carbon;
use App\Models\Skill;
class CustomerController extends Controller
{
    public function followJob(Request $request)
    {
        $job_id = $request->id;
        $user_id = session()->get('user')->user_id;
        $customer = Customer::find($user_id);
        $followJobs = $customer->follow;
        if($followJobs){
            $followJobsArr = explode(',',$followJobs);
            array_push($followJobsArr, $job_id);
            $customer->follow = implode(',',$followJobsArr);
        }else{
            $customer->follow = $job_id;
        }
            session()->put('follow',$customer->follow);
            $customer->save();
        return 'đã theo dõi';
    }

    public function unFollowJob(Request $request)
    {
        $job_id = $request->id;
        $user_id = session()->get('user')->user_id;
        $customer = Customer::find($user_id);
        $followJobs = $customer->follow;
        if($followJobs){
            $followJobsArr = explode(',',$followJobs);
            $key = array_search($job_id, $followJobsArr);
            unset($followJobsArr[$key]);
            $customer->follow = implode(',',$followJobsArr);
            session()->get('user')->customer->follow = $customer->follow;
        }
            session()->put('follow',$customer->follow);
            $customer->save();
        return 'đã bỏ theo dõi';
    }

    public function listJobFollowed()
    {
        $user_id = session()->get('user')->user_id;
        $customer = Customer::where('user_id', $user_id)->first();
        $job_ids = $customer->follow;
        $jobs = Job::whereIn('id',explode(',', $job_ids))->paginate(10);
        $skills = Skill::all();
        Carbon::setLocale('vi');
        $now = Carbon::now();
        return view('frontend.user.list-job-followed', compact('jobs', 'skills', 'now'));
    }

    public function downloadCV($id)
    {
        $customer = Customer::where('user_id', $id)->first();
        $file = public_path(). '/jobfinderportal-master/assets/cv/' . $customer->cv;

        $headers = array('Content-Type: application/pdf');

        return \Illuminate\Support\Facades\Response::download($file, $customer->cv, $headers);
    }
}
