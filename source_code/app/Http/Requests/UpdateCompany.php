<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompany extends FormRequest
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
            "logo" => 'nullable|image',
            "email" => ['required', 'email', 'max:100', Rule::unique('companies', 'email')->ignore($this->id)],
            "fullname" => ['required', 'min:8', 'max:100', Rule::unique('companies', 'fullname')->ignore($this->id)],
            "shortname" => 'required|max:15',
            "phone" => 'required|numeric',
            "size_id" => 'nullable|exists:company_sizes,size_id',
            "field_id" => 'nullable|exists:fields,field_id',
            "city_id" => 'nullable|exists:cities,city_id',
            "address" => 'nullable|min:3|max:200',
            "map" => 'nullable|url|max:400',
            "tax_code" => 'required|numeric|min:10',
            "website" => ['nullable', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/i', 'max:200'],
            "description" => 'required|min:8',
        ];
    }
}
