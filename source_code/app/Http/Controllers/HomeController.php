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
use App\Models\Apply;

class HomeController extends Controller
{
    public function getHome()
    {
        $cities = City::all();
        $categories = Category::all();
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();
        $most_hired_companies = Company::where('status', 1)->orderByDesc('total_jobs')->limit(8)->get();
        $skills = Skill::all();
        Carbon::setLocale('vi');
        $now = Carbon::now();
        return view('frontend.home', compact('jobs', 'most_hired_companies', 'cities', 'categories', 'skills', 'now'));
    }

    public function getAdminHome()
    {
        if (!$this->userCan('view-page-admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));

        }

        return view('admin.home');
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

    public function getDetailJob(Request $request, $id)
    {
        $skills = Skill::all();
        Job::where('id', $id)->increment('view');
        $job = Job::where('id', $id)->firstOrFail();
        $job_recommend = Job::where('is_suggest', 1)->get();
        $category_id = $job->category_id;
//        dd($category_id);
        $job_same = Job::where('category_id', $category_id)->paginate(3);

//        if($request->ajax()){
//            return view('frontend.job.list-data', compact('job','job_recommend', 'skills', 'job_same'));
//        }
        return view('frontend.job.job_detail', compact('job','job_recommend', 'skills', 'job_same'));
    }

    public function getSameJob($id)
    {
        $skills = Skill::all();
        $jobs = Job::where('category_id', $id)->get();
        $now = Carbon::now();
        return view('frontend.job.list-data', compact('jobs', 'skills', 'now'));
    }


    public function getProfile()
    {
//        dd(session()->get('user')->experience->exp_year);
//        $id = session()->get('user')->user_id;
        if (session()->get('user')->role == 'customer') {
            $id = session()->get('user')->user_id;
            $exp = Experience::where('id', $id)->get();
            $customer = Customer::where('user_id', $id)->firstOrFail();
            return view('frontend.user.user-profile', compact('exp', 'customer'));
        }
            $cities = City::all();
            $companySizes = CompanySize::all();
            $fields = Field::all();
            $company = session()->get('user')->company;
            return view('frontend.user.company-information', compact('cities', 'companySizes', 'fields', 'company'));



    }
    public function addExp(Request $request)
    {
        $this->validate($request, [
            'company'=>'required',
            'title'=>'required'
        ]);
        $id = session()->get('user')->user_id;
//        $exp = Experience::where('id', $id)->firstOrFail();
        $exp = new Experience();
        $exp->id = $id;
        $exp->position = $request->title;
        $exp->company = $request->company;
        $exp->since = $request->from;
        $exp->to_date = $request->to;
        $exp->content = $request->content_a;
        $exp->save();
        Session::flash('success', 'Update experience success');
        return redirect()->back();
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'email'=>'required',
            'phone'=>'required',
            'birth'=>'required',
            'cv'=>'mimes:pdf'
        ]);
        $id = session()->get('user')->user_id;
        $customer = Customer::where('user_id', $id)->firstOrFail();


        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->birth = $request->birth;
        $customer->sex = $request->sex;
        $customer->address = $request->add;
        $customer->marry = $request->marry;

        if ($request->hasFile('cv')) {
            $destinaton = 'jobfinderportal-master/assets/cv';
            $cv = $request->file('cv');
            $cv_name = $cv->getClientOriginalName();
//           $path = $request->file('image')->storeAs($destinaton, $img_name );
            $cv->move($destinaton,$cv_name);
            $customer->cv = $cv_name;
        }
        $customer->save();
        Session::flash('success_profile', 'Update profile success');
//        return view('frontend.user.user-profile', compact('exp', 'customer'));
//        return redirect()->route('frontend.user-profile');
        return redirect()->back();
    }

    public function getExp($id)
    {

        $id_user = session()->get('user')->user_id;
        $exp = Experience::where('exp_id',$id)->firstOrFail();
        return view('frontend.user.show-exp', compact('exp'));
    }

    public function updateExp(Request $request,$id)
    {

        $id_user = session()->get('user')->user_id;
        $exp = Experience::where('exp_id',$id)->firstOrFail();
        $exp->position = $request->title;
        $exp->company = $request->company;
        $exp->since = $request->from;
        $exp->to_date = $request->to;
        $exp->content = $request->content_a;
        $exp->save();
        Session::flash('success', 'Update experience success');
        return redirect()->back();
//        return redirect()->route('frontend.getExp');
    }

    public function destroyExp($id)
    {
        $exp = Experience::where('exp_id',$id)->firstOrFail();
        $exp->delete();

        Session::flash('success', 'Xóa kinh nghiệm thành công');

        return redirect()->back();
    }

    public function listJobApply()
    {
        $id_user = session()->get('user')->user_id;
        $job_apply = Apply::where('user_id',$id_user)->get();
//        dd($job_apply);
        $list_job = [];
        foreach ($job_apply as $value){
            $list_job[] = $value->job_id;
        }
//        dd($list_job);
        $job = Job::whereIn('id', $list_job)->get();
        $skills = Skill::all();
        return view('frontend.user.job-apply', compact('job_apply', 'job','skills'));
    }

}
