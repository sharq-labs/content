<?php

namespace App\Rules\Auth;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidUserCredentials implements ValidationRule
{
    protected string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('email', $this->email)->first();

        if (! $user || ! Hash::check($value, $user->password)) {
            $fail(__('auth.password')); // Defaults to: "These credentials do not match our records."
        }
    }
}
