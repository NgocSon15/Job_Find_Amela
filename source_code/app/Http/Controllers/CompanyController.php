<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Field;
use App\Models\City;
use App\Models\CompanySize;


class CompanyController extends Controller
{
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
        $company = Company::where('company_id', $id)->first();

        return view('frontend.company.show', compact('company'));
    }

    public function filter(Request $request)
    {
        $companies = Company::paginate(7);
        if(isset($request->field_id))
        {
            $field_id = $request->field_id;
            $companies = $companies->where('field_id', $field_id);
        }
        if(isset($request->city_id))
        {
            $city_id = $request->city_id;
            $companies = $companies->where('city_id', $city_id);
        }
        if(isset($request->size_id))
        {
            $size_id = $request->size_id;
            $companies = $companies->where('size_id', $size_id);
        }
        $fields = Field::all();
        $cities = City::all();
        $sizes = CompanySize::all();
        $total_companies = Company::count();

        return view('frontend.company.list', compact('companies', 'total_companies', 'fields', 'cities', 'sizes'));
    }
}
