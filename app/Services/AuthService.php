<?php

namespace App\Services;

use App\DataTransferObjects\Auth\LoginData;
use App\Exceptions\Auth\IncorrectCredentialsException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @throws IncorrectCredentialsException
     */
    public function attemptLogin(LoginData $data): User
    {
        $user = User::query()
            ->where('email', $data->email)
            ->first();

        if (is_null($user) || !Hash::check($data->password, $user->password)) {
            throw new IncorrectCredentialsException();
        }

        return $user;
    }
}
