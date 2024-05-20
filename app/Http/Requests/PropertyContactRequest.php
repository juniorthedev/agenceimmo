<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            //
            'firstname' => ['string', 'required', 'min:1'],
            'lastname' => ['string', 'required', 'min:1'],
            'phone' => ['string', 'min:1', 'nullable'],
            'email' => ['email', 'required', 'min:1'],
            'message' => ['string', 'min:1', 'required'],
        ];
    }
}
