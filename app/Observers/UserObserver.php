<?php

namespace App\Observers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

readonly class UserObserver implements ShouldHandleEventsAfterCommit
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if (is_null($user->email_verified_at)) {
            $this->userService->verifyEmail($user);
        }
    }
}
