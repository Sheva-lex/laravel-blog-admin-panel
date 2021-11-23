<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $postId = $this->post ? $this->post->id : '';
        return [
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'string', 'max:191', 'unique:tags,name', 'regex:/^\S*$/u'],
            'title' => ['required', 'string', 'max:191', 'unique:posts,title,' . $postId],
            'text' => ['nullable', 'string'],
        ];
    }

    public function prepareForValidation()
    {
        if ($tags = $this->get('tags')) {
            $this->merge([
                'tags' => explode(",", $tags),
            ]);
        }
    }

    public function messages(): array
    {
        return [
            'tags.*.unique' => 'Тег :input вже існує',
            'tags.*.regex' => 'Тег :input містить пробіл, що не допустимо',
        ];
    }
}
