<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends APIRequest
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
            'author' => 'required',
            'title' => 'required',
            'publishing_house' => 'required',
            'no_items' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'author.required' => 'Author is required!',
            'title.required' => 'Title is required!',
            'publishing_house.required' => 'Publising House is required!',
            'no_items.required' => 'No of Items is required!'
        ];
    }
}
