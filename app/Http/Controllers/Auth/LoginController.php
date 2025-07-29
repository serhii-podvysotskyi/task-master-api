<?php

namespace App\Http\Controllers\Auth;

use App\DataTransferObjects\Auth\LoginData;
use App\Exceptions\Auth\IncorrectCredentialsException;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller implements HasMiddleware
{
    public function __construct(
        private readonly AuthService $authService,
    ) {
    }

    /**
     * Get the middleware that should be assigned to the controller.
     */
    #[\Override]
    public static function middleware(): array
    {
        return [
            'guest',
        ];
    }

    /**
     * Handle the incoming request.
     * @throws IncorrectCredentialsException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $data = new LoginData(
            email: $request->string('email'),
            password: $request->string('password'),
        );
        $user = $this->authService->attemptLogin($data);

        Auth::login($user);
        Session::regenerate();

        return new JsonResponse(null, HttpResponse::HTTP_ACCEPTED);
    }
}
