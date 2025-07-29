<?php

namespace App\Exceptions;

use Exception as BaseException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Http\JsonResponse;

abstract class Exception extends BaseException
{
    public function __construct($message, $code = HttpResponse::HTTP_BAD_REQUEST)
    {
        parent::__construct($message, $code);
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(): JsonResponse
    {
        return new JsonResponse([
            [
                'error' => $this->message,
                'status_code' => $this->code,
            ]
        ], $this->code);
    }
}
