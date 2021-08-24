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
            'company_id' => 'required|exists:companies,id',
            'job_title' => 'required|min:4',
            'job_description' => 'required|min:8',
            'skill_id' => 'required|exists:skills,skill_id',
            'category_id' => 'required|exists:categories,cat_id',
            'min_salary' => 'required|integer|min:0',
            'max_salary' => 'required|integer|gt:min_salary',
            'work_location' => 'required',
            'job_type' => 'required|integer|min:0|max:2',
            'experiences' => 'required|integer|min:0',
            'expiration' => 'required',
            'position_id' => 'required|exists:positions,position_id',
            'gender' => 'integer|min:0|max:3',
            'quantity' => 'required|integer|min:0',
        ];
    }

    // public function messages()
    // {
    //     $messages = [
    //         'company_id.required' => 'Hãy nhập ',
    //         'job_title.required' => 'Hãy nhập ',
    //         'job_description.required' => 'Hãy nhập ',
    //         'skill_id.required' => 'Hãy nhập ',
    //         'job_code.required' => 'Hãy nhập ',
    //         'category_id.required' => 'Hãy nhập ',
    //         'min_salary.required' => 'Hãy nhập ',
    //         'max_salary.required' => 'Hãy nhập ',
    //         'work_location.required' => 'Hãy nhập ',
    //         'job_type.required' => 'Hãy nhập ',
    //         'experiences.required' => 'Hãy nhập ',
    //         'expiration.required' => 'Hãy nhập ',
    //         'position_id.required' => 'Hãy nhập ',
    //         'gender.required' => 'Hãy nhập ',
    //         'quantity.required' => 'Hãy nhập ',
    //         'status.required' => 'Hãy nhập ',
    //         'is_hot.required' => 'Hãy nhập ',
    //         'is_suggest.required' => 'Hãy nhập ',
    //         'view.required' => 'Hãy nhập ',
    //         'reference_ids.required' => 'Hãy nhập '

    //     ];
    //     return $messages;
    // }
}
