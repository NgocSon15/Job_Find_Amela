<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Field;
use App\Models\City;
use App\Models\CompanySize;
use App\Models\Job;
use App\Models\Skill;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateCompany;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(5);
        return view('admin.company.list', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $fields = Field::all();
        $cities = City::all();
        $sizes = CompanySize::all();
        return view('admin.company.edit', compact('company', 'fields', 'cities', 'sizes'));
    }

    public function update(UpdateCompany $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->fullname = $request->fullname;
        $company->shortname = $request->shortname;
        $company->tax_code = $request->tax_code;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->map = $request->map;
        if($request->logo)
        {
            if($company->logo)
            {
                Storage::delete('/public/images'.$company->logo);
            }
            $file = $request->logo;
            $originName = pathinfo($file->getClientOriginalName());
            $file->move('storage/images', $originName['basename']);
            $company->logo = $originName['basename'];
        }
        $company->field_id = $request->field_id;
        $company->city_id = $request->city_id;
        $company->size_id = $request->size_id;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->description = $request->description;

        $company->save();

        Session::flash('success', 'S???a th??ng tin th??nh c??ng');
        return redirect()->route('admin.company.index');
    }

    public function feUpdate(UpdateCompany $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->fullname = $request->fullname;
        $company->shortname = $request->shortname;
        $company->tax_code = $request->tax_code;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->map = $request->map;
        if($request->logo)
        {
            if($company->logo)
            {
                Storage::delete('/public/images'.$company->logo);
            }
            $file = $request->logo;
            $originName = pathinfo($file->getClientOriginalName());
            $file->move('storage/images', $originName['basename']);
            $company->logo = $originName['basename'];
        }
        $company->field_id = $request->field_id;
        $company->city_id = $request->city_id;
        $company->size_id = $request->size_id;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->description = $request->description;

        $company->save();

        session()->get('user')->company = $company;

        Session::flash('success', 'C???p nh???t th??ng tin th??nh c??ng');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        Session::flash('success', 'X??a th??nh c??ng');
        return redirect()->route('admin.company.index');
    }

    public function feIndex()
    {
        $total_companies = Company::where('status', 1)->count();
        $companies = Company::where('status', 1)->paginate(7);
        $fields = Field::all();
        $cities = City::all();
        $sizes = CompanySize::all();

        return view('frontend.company.list', compact('total_companies', 'companies', 'fields', 'cities', 'sizes'));
    }

    public function feShow($id)
    {
        $company = Company::where('id', $id)->first();

        return view('frontend.company.show', compact('company'));
    }

    public function filter(Request $request)
    {
        $query = Company::query()->where('status', 1);

        if(isset($request->field_id))
        {
            $query->where('field_id', $request->field_id);
        }
        if(isset($request->city_id))
        {
            $query->where('city_id', $request->city_id);
        }
        if(isset($request->size_id))
        {
            $query->where('size_id', $request->size_id);
        }

        $companies = $query->paginate(7);
        $total_companies = $query->count();
        $fields = Field::all();
        $cities = City::all();
        $sizes = CompanySize::all();

        return view('frontend.company.list', compact('companies', 'total_companies', 'fields', 'cities', 'sizes'));
    }

    public function getJobList($id)
    {
        $skills = Skill::all();
        $company = Company::findOrFail($id);
        $jobs = Job::where('company_id', $company->id)->paginate(7);
        Carbon::setLocale('vi');
        $now = Carbon::now();
        $skills = Skill::all();
        return view('frontend.company.list_job', compact('company', 'now', 'jobs', 'skills'));
    }

    public function verify($id)
    {
        $company = Company::findOrFail($id);
        $company->status = 1;
        $company->save();

        if(session()->has('user') && session()->get('user')->role == 'company')
        {
            session()->get('user')->company->status = $company->status;
        }

        session()->flash('success', '???? duy???t c??ng ty ' . $company->fullname);
        return redirect()->route('admin.company.index');
    }

    public function lock($id)
    {
        $company = Company::findOrFail($id);
        $company->status = 2;
        $company->save();

        if(session()->has('user') && session()->get('user')->role == 'company')
        {
            session()->get('user')->company->status = $company->status;
        }

        session()->flash('success', '???? kh??a c??ng ty ' . $company->fullname);
        return redirect()->route('admin.company.index');
    }

    public function unlock($id)
    {
        $company = Company::findOrFail($id);
        $company->status = 1;
        $company->save();

        if(session()->has('user') && session()->get('user')->role == 'company')
        {
            session()->get('user')->company->status = $company->status;
        }

        session()->flash('success', '???? m??? kh??a c??ng ty ' . $company->fullname);
        return redirect()->route('admin.company.index');
    }

    public function suggest(Request $request)
    {
        $id = $request->id;
        $company = Company::findOrFail($id);
        $company->is_suggest = $request->isSuggest;
        $company->save();
    }

    public function lockJob(Request $request)
    {
        
        $job_id = $request->id;
        $job = Job::find($job_id);
        if($job->status == 2){
            return 'Kh??ng c?? quy???n kh??a';
        }
        $job->status = 0;
        $job->save();
        return 'success';
    }

    public function unlockJob(Request $request)
    {
        $job_id = $request->id;
        $job = Job::find($job_id);
        if($job->status == 2){
            return 'Kh??ng c?? quy???n m??? kh??a';
        }
        $job->status = 1;
        $job->save();
        return 'success';
    }

    public function suggestToAdmin(Request $request)
    {
        $job_id = $request->id;
        $job = Job::findOrFail($job_id);
        $job->suggestion_to_admin = 1;
        $job->is_suggest = 2;
        $job->save();
    }
    public function delSuggestToAdmin(Request $request)
    {
        $job_id = $request->id;
        $job = Job::findOrFail($job_id);
        $job->suggestion_to_admin = null;
        $job->is_suggest = 0;
        $job->save();
    }

    public function listCandidates()
    {
        $users = User::where('role', 'customer')->paginate(20);
        return view('frontend.user.list-candidates', compact('users'));
    }

    public function showCandidate(Request $request)
    {
        $user_id = $request->id;
        $user = User::find($user_id);
        $listBlock = $user->customer->block;
        $listBlock = explode(',', $listBlock);
        $company_id = session()->get('user')->company_id;
        if(in_array($company_id, $listBlock)){
            return abort(404);
        }else{
            return view('frontend.user.candidate-detail', compact('user'));
        }
    }

}
