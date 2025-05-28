<?php

namespace App\Http\Requests\API\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'content' => ['sometimes', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'scheduled_time' => ['nullable', 'date'],
            'platform_ids' => ['sometimes', 'array'],
            'platform_ids.*' => function ($attribute, $value, $fail) {
                $userId = $this->user()->id;

                $exists = DB::table('user_platform')
                    ->where('user_id', $userId)
                    ->where('platform_id', $value)
                    ->exists();

                if (! $exists) {
                    $fail("The selected platform (ID: $value) is not assigned to your account.");
                }
            },
        ];
    }

    public function messages(): array
    {
        return [
            'platform_ids.*.exists' => 'You can only select platforms assigned to you.',
        ];
    }
}
