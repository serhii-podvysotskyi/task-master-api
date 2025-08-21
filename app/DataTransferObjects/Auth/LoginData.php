<?php

namespace App\DataTransferObjects\Auth;

use App\DataTransferObjects\DataTransferObject;

readonly class LoginData extends DataTransferObject
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
