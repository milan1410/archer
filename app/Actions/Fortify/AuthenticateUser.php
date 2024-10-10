<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class AuthenticateUser
{
    public function __invoke()
    {
        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();
            dd($user);
            if ($user &&
                Hash::check($request->password, $user->password) &&
                $user->role === 'employee') {
                return $user;
            }

            return null;
        });
    }
}