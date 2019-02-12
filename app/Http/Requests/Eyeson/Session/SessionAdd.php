<?php

namespace App\Http\Requests\Eyeson\Session;

use Illuminate\Foundation\Http\FormRequest;

class SessionAdd extends FormRequest
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
            'client' => 'required|numeric',
            'department'=> 'required|numeric',
            'service' => 'required|array',
            'price' => 'required|array',
            'totalPrice' => 'required|numeric',
            'paid' => 'required|numeric',
            'reminding' => 'required|numeric',
        ];
    }
}
