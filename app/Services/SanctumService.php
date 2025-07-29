<?php

namespace App\Services;

use App\Models\User;

class SanctumService
{
    public function createUserToken(User $user, string $name = 'api'): string
    {
        return $user->createToken($name)->plainTextToken;
    }
}
