<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class UserService
{
    public function verifyEmail(User $user): User
    {
        $user->email_verified_at = Carbon::now();
        $user->save();

        return $user;
    }
}
