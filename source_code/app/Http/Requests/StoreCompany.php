<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "logo" => 'required|image',
            "email" => 'required|email|unique:users,email|max:100',
            "fullname" => 'required|min:8|max:100',
            "short_name" => 'required|max:15',
            "phone" => 'required|numeric',
            "size_id" => 'nullable|exists:company_sizes,size_id',
            "field_id" => 'nullable|exists:fields,field_id',
            "city_id" => 'nullable|exists:cities,city_id',
            "address" => 'nullable|min:8|max:200',
            "google_map" => 'nullable|url|max:400',
            "tax_code" => 'required|numeric|min:10',
            "website" => 'nullable|url|max:200',
            "facebook" => 'nullable|url|max:200',
            "description" => 'required|min:8',
        ];
    }
}
