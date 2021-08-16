<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\StoreCompany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Customer;
use App\Models\Company;
use App\Models\City;
use App\Models\CompanySize;
use App\Models\Field;
use App\Mail\NotifySuccess;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function showRegisterCustomer()
    {
        return view('frontend.register.register_customer');
    }
    public function registerCustomer(StoreCustomer $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->password = md5($request->password);
        // $user->password = bcrypt($request->password);
        $user->role = 'customer';
        $user->save();

        $customer = new Customer;
        $customer->user_id = User::orderBy('user_id', 'desc')->first()->user_id;
        $customer->fullname = $request->fullname;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();
        Mail::to($user->email)->send(new NotifySuccess($user, $request->password));
        return view('frontend.register.register_success');
    }

    public function showRegisterCompany()
    {
        $cities = City::all();
        $companySizes = CompanySize::all();
        $fields = Field::all();
        return view('frontend.register.register_company', compact('cities', 'companySizes', 'fields'));
    }
    public function registerCompany(Request $request)
    {
        $tax_code = $request->tax_code;
        $company = Company::where('tax_code', $tax_code)->first();
        if ($company !== null) {
            $company_id = $company->company_id;
        }else{
            $company = new Company;
            $company->email = $request->email;
            $company->fullname = $request->fullname;
            $company->shortname = $request->shortname;
            $company->company_code = strtoupper(substr($request->short_name, 0, 3)) . $company->user_id . rand(1000, 9999);
            $file = $request->logo;
            $originName = pathinfo($file->getClientOriginalName());
            $extension = $originName['extension'];
            $filename = "$company->company_code.$extension";
            $file->move('storage/images', $filename);
            $company->logo = $filename;

            $company->tax_code = $request->tax_code;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->map = $request->google_map;
            $company->website = $request->website;
            // $company->facebook = $request->facebook;
            $company->description = $request->description;
            $company->field_id = $request->field_id;
            $company->city_id = $request->city_id;
            $company->size_id = $request->size_id;
            $company->save();
            $company_id = Company::orderBy('company_id', 'desc')->first()->company_id;
        }

        $user = new User;
        $user->company_id = $company_id;
        $user->email = $request->email;
        $password = Str::random(8);
        $user->password = md5($password);
        // $user->password = bcrypt($password);
        $user->role = 'company';
        $user->save();

        Mail::to($user->email)->send(new NotifySuccess($user, $password));
        session()->flash('companySuccess', true);
        return view('frontend.register.register_success');
    }
}