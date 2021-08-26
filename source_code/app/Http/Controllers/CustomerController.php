<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
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
}
