<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
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
        return view('admin.company.edit', compact('company'));
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
}
