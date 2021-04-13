<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends APIRequest
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
            'name' => 'required',
            'firstSurname' => 'required',
            'secondSurname' => 'required',
            'age' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'firstSurname.required' => 'FirstSurname is required!',
            'firstSurname.required' => 'SecondSurname is required!',
            'age.required' => 'Age is required!'
        ];
    }
}
