<?php

namespace App\Actions\Fortify;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $role = null;

        // validate create user form
        $registerValidator = new RegisterRequest();
        Validator::make(
            $input,
            $registerValidator->rules(),
            $registerValidator->messages()
        )->validate();

        // get role 
        if ($input['role']) {
            $role = Role::find($input['role']);
        } else {
            $role = Role::where('libelle', 'auth');
        }

        // create user in bdd
        $user = User::create([
            // 'first_name' => $input['firstName'],
            // 'last_name' => $input['lastName'],
            // 'pseudo' => $input['pseudo'],
            'name' => $input['name'], // delete this if use first_name
            // 'name' => $input['firstName'] . ' ' . $input['lastName'],
            // 'address' => $input['address'],
            // 'code_post' => $input['codePost'],
            // 'city' => $input['city'],
            // 'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // assign role in user
        $role->users()->save($user);

        return $user;
    }
}
