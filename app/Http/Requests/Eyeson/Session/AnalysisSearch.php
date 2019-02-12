<?php

namespace App\Http\Requests\Eyeson\Session;

use Illuminate\Foundation\Http\FormRequest;

class AnalysisSearch extends FormRequest
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
            'startDate' => 'required',
            'endDate.*' => 'required',
        ];
    }
}
