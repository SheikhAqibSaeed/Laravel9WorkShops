<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:1000',
            'is_publish' => 'required',
            'is_active' => 'required'

        ];
    }
}
