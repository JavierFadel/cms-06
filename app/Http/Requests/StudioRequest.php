<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudioRequest extends FormRequest
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
            'name' => 'bail|required',
            'branch_id' => 'required|numeric|exists:branches,id',
            'basic_price' => 'required|numeric|min:1|max:10000000',
            'additional_friday_price' => 'required|numeric|min:0|max:1000000',
            'additional_saturday_price' => 'required|numeric|min:0|max:1000000',
            'additional_sunday_price' => 'required|numeric|min:0|max:1000000',
        ];
    }
}
