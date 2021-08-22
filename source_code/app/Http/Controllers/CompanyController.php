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

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('admin.company.index');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        Session::flash('success', 'Xóa thành công');
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
        return view('frontend.company.list_job', compact('company', 'now', 'jobs', 'skills'));
    }

    public function accessDeny()
    {
        return view('frontend.company.accessDeny');
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

        session()->flash('success', 'Đã duyệt công ty ' . $company->fullname);
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

        session()->flash('success', 'Đã khóa công ty ' . $company->fullname);
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

        session()->flash('success', 'Đã mở khóa công ty ' . $company->fullname);
        return redirect()->route('admin.company.index');
    }

    public function suggest(Request $request)
    {
        $id = $request->id;
        $company = Company::findOrFail($id);
        $company->is_suggest = $request->isSuggest;
        $company->save();
    }
}
