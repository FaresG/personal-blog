<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [Rule::unique('posts')->ignore($this->post), 'string'],
            'summary' => ['string', 'max:255'],
            'published' => ['required', 'boolean'],
            'categories' => ['required', 'exists:categories,id', 'array']
        ];
    }
}
