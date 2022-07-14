<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class RegisterRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // if create user by user admin or other, turn with false this
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // rules
            // 'firstName' => ['required', 'string'],
            // 'lastName' => ['required', 'string'],
            // 'pseudo' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'], // delete this if use first_name
            // 'address' => ['required', 'string'],
            // 'codePost' => ['required', 'string'],
            // 'city' => ['required', 'string'],
            // 'phone' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // message of rule
            // 'firstName.required' => 'Champ obligatoire',
            // 'lastName.required' => 'Champ obligatoire',
            // 'pseudo.required' => 'Champ obligatoire',
            'name.required' => 'Champ obligatoire',
            // 'address.required' => 'Champ obligatoire',
            // 'codePost.required' => 'Champ obligatoire',
            // 'city.required' => 'Champ obligatoire',
            // 'phone.required' => 'Champ obligatoire',
            'email.required' => 'Champ obligatoire',
            'email.email' => 'Entrer un email valide',
            'email.max' => 'Email trop long',
        ];
    }
}
