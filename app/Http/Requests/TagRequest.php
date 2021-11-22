<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.*' => ['required', 'string', 'max:191', 'unique:tags,name'],
            'post_id' => ['nullable', 'integer', 'exists:posts,id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => explode(",", $this->get('name')),
        ]);
    }

    public function messages(): array
    {
        return [
            'name.*.unique' => 'Тег :input вже існує',
        ];
    }
}
