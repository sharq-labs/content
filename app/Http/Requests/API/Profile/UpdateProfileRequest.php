<?php

namespace App\Http\Requests\Profile;

use App\Rules\Profile\NotSameAsOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'required',
                'email',
                'unique:users,email,'.$this->user()->id,
            ],
            'password' => [
                'sometimes',
                new NotSameAsOldPassword,
                Password::min(8)
                    ->letters()
                    ->mixedCase(),
            ],
        ];
    }
}
