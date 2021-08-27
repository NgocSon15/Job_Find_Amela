<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Job;
use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Company;

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

    public function listBlocked(){
        $user_id = session()->get('user')->user_id;
        $customer = Customer::find($user_id);
        $company_ids = explode(',',$customer->block);
        $companies = Company::find($company_ids);
        // dd($companies);
        return view('frontend.user.list-companies-blocked', compact('companies'));
    }

    public function searchCompany(Request $request)
    {
        if($request->ajax()){
            $user_id = session()->get('user')->user_id;
            $customer = Customer::find($user_id);
            $company_ids = explode(',',$customer->block);
            $keyword = $request->keyword;
            $keyword = explode(' ', $keyword);
            $newKeyWord = '%';
            foreach($keyword as $word){
                $newKeyWord .= "$word%";
            }
            $companies = Company::where('fullname', 'like', $newKeyWord)->whereNotIn('id', $company_ids)->get();
            return $companies;
        }
    }

    public function blockCompany(Request $request)
    {
        $company_id = $request->id;
        $user_id = session()->get('user')->user_id;
        $customer = Customer::find($user_id);
        $company_ids = explode(',',$customer->block);
        if(!in_array($company_id, $company_ids)){
            array_push($company_ids, $company_id);
            $customer->block = trim(implode(',', $company_ids), ',');
            $customer->save();
            $company = Company::find($company_id);
            return $company;
        }
        return 'blocked';
    }
    public function unblockCompany(Request $request)
    {
        $company_id = $request->id;
        $user_id = session()->get('user')->user_id;
        $customer = Customer::find($user_id);
        $company_ids = explode(',',$customer->block);
        $key = array_search($company_id, $company_ids);
        unset($company_ids[$key]);
        $customer->block = implode(',', $company_ids);
        $customer->save();
    }
}
