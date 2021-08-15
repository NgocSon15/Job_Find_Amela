<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'company_id' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'skill_id' => 'required',
            'job_code' => 'required',
            'category_id' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
            'work_location' => 'required',
            'job_type' => 'required',
            'experiences' => 'required',
            'expiration' => 'required',
            'position_id' => 'required',
            'gender' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'is_hot' => 'required',
            'is_suggest' => 'required',
            'view' => 'required',
            'reference_ids' => 'required'
        ];
    }

    public function messages()
    {
        $messages = [
            'company_id.required' => 'Hãy nhập ',
            'job_title.required' => 'Hãy nhập ',
            'job_description.required' => 'Hãy nhập ',
            'skill_id.required' => 'Hãy nhập ',
            'job_code.required' => 'Hãy nhập ',
            'category_id.required' => 'Hãy nhập ',
            'min_salary.required' => 'Hãy nhập ',
            'max_salary.required' => 'Hãy nhập ',
            'work_location.required' => 'Hãy nhập ',
            'job_type.required' => 'Hãy nhập ',
            'experiences.required' => 'Hãy nhập ',
            'expiration.required' => 'Hãy nhập ',
            'position_id.required' => 'Hãy nhập ',
            'gender.required' => 'Hãy nhập ',
            'quantity.required' => 'Hãy nhập ',
            'status.required' => 'Hãy nhập ',
            'is_hot.required' => 'Hãy nhập ',
            'is_suggest.required' => 'Hãy nhập ',
            'view.required' => 'Hãy nhập ',
            'reference_ids.required' => 'Hãy nhập '
  
        ];
        return $messages;
    }
}
