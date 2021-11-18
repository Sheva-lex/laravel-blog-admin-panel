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
            'name' => ['required', 'string', 'max:191', 'unique:tags'],
            'post_id' => ['nullable', 'integer', 'exists:posts,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Тег ' . $this->name . ' вже існує',
        ];
    }
}
