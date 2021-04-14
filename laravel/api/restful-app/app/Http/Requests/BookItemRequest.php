<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookItemRequest extends APIRequest
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
            'code' => 'required',
            'format' => 'required',
            'book_shelf' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Code is required!',
            'format.required' => 'Format is required!',
            'book_shelf.required' => 'Book Shelf is required!'
        ];
    }
}
