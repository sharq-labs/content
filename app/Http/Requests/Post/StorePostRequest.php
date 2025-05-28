<?php

namespace App\Http\Requests\API\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'], // for Spatie
            'scheduled_time' => ['nullable', 'date'],
            'platform_ids' => ['required', 'array'],
            'platform_ids.*' => [
                Rule::exists('user_platform', 'platform_id')
                    ->where('user_id', $this->user()->id),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'platform_ids.*.exists' => 'You can only select platforms assigned to you.',
        ];
    }
}
