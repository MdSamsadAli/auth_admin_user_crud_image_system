<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // 'image' => 'required|image|mimes:jpeg,png,jpg',
            'title'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            // 'image.required'=>'product field cannot be empty',
            // 'image.image'=>'only jpeg, png and jpg format supported',
            'title.required'=>'title field cannot be empty',
            'price.required'=>'price field cannot be empty',
            'description.required'=>'description field cannot be empty',
        ];
    }
}
