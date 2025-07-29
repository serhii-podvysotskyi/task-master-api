<?php

namespace App\Exceptions\Auth;

use App\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class IncorrectCredentialsException extends Exception
{
    public function __construct()
    {
        parent::__construct(
            message: "The provided credentials are incorrect.",
            code: HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
        );
    }
}
