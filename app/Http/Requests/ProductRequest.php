<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class ProductRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required','unique:products'],
            'category_id' => ['required','numeric'],
            'price' => ['required'],
            'quantity' => ['required'],
            'image' => ['required'],
            'description' => ['required'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
