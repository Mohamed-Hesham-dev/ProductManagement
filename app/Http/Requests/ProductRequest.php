<?php

// app/Http/Requests/ProductRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function storeRules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description_name_ar' => 'required',
            'description_name_en' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ];
    }

    public function updateRules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description_name_ar' => 'required',
            'description_name_en' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'The name En field is required.',
            'name_ar.required' => 'The name Ar field is required.',
            'description_name_ar.required' => 'The description Ar field is required.',
            'description_name_en.required' => 'The description En field is required.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.numeric' => 'The quantity must be a number.',
            'category_id.required' => 'Please select a category.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2048 kilobytes (2MB).',
        ];
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            return $this->storeRules();
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            return $this->updateRules();
        }

        return [];
    }
}

?>