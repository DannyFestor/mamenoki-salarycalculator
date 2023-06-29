<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:254'],
            //'email_verified_at' => ['nullable', 'date'],
            //'password' => ['nullable'],
            //'remember_token' => ['nullable'],
        ];
    }
}
