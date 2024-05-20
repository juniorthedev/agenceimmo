<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:4'],
            'surface' => ['required', 'integer', 'min:2'],
            'rooms' => ['required','integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required','integer', 'min:0'],
            'price' => ['required','integer', 'min:0'],
            'address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'postal_code' => ['required', 'max:255'],
            'options' => ['array', 'required', 'exists:options,id'],
            'sold' => ['required', 'boolean'],
        ];
    }
}
