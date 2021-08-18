<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Field;
use App\Models\City;
use App\Models\CompanySize;
use App\Models\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(5);
        return view('admin.company.list', compact('companies'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->fullname = $request->input('fullname');
        $company->tax_code = $request->input('tax_code');
        $company->company_code = $request->input('company_code');
        $company->email = $request->input('email');
        $company->address = $request->input('address');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $company->logo = $path;
        } else{
            $company->logo = "";
        }

        $company->description = $request->input('description');
        $company->phone = $request->input('phone');

        $company->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('admin.company.index');
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

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->fullname = $request->input('fullname');
        $company->tax_code = $request->input('tax_code');
        $company->company_code = $request->input('company_code');
        $company->email = $request->input('email');
        $company->address = $request->input('address');

        if ($request->hasFile('image')) {
            $currentImg = $company->logo;
            if($currentImg)
            {
                Storage::delete('/public/'.$currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $company->logo = $path;
        }

        $company->description = $request->input('description');
        $company->phone = $request->input('phone');

        $company->save();

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('admin.company.index');
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.delete', compact('company'));
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
        $total_companies = Company::count();
        $companies = Company::paginate(7);
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
        $query = Company::query();

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
        $company = Company::findOrFail($id);
        $jobs = Job::where('company_id', $company->id)->paginate(7);
        Carbon::setLocale('vi');
        $now = Carbon::now();
        return view('frontend.company.list_job', compact('company', 'now', 'jobs'));
    }
}
