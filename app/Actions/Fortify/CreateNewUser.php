<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Pct\AppConfig;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'birthdate'=>['required'],
            'mobile_phone'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([

            'name' => $input['name'],
            'maiden_name' => $input['maiden_name'],
            'mobile_phone'=>$input['mobile_phone'],
            'office_phone'=>$input['office_phone'],
            'birthdate' => $input['birthdate'],
            'user_type' =>User::getUserType(),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
