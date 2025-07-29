<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    #[\Override]
    public static function middleware(): array
    {
        return [
            'auth:sanctum',
        ];
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResponse
    {
        Auth::logout();

        Session::invalidate();
        Session::regenerateToken();

        return new JsonResponse(null, HttpResponse::HTTP_ACCEPTED);
    }
}
