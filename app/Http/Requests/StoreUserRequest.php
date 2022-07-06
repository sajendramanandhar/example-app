<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'max:255',
                'string',
                'email',
                'unique:'.User::class,
            ],
            'image' => [
                'nullable',
                'image',
                'max:15360',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:40',
                'confirmed',
            ],
        ];
    }
}
