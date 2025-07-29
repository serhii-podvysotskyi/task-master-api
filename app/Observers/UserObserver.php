<?php

namespace App\Observers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

readonly class UserObserver implements ShouldHandleEventsAfterCommit
{
    public function __construct(private UserService $userService)
    {
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

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
