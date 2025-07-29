<?php

namespace Feature\Observers;

use App\Models\User;
use Tests\Feature\TestCase;

class UserObserverTest extends TestCase
{
    public function test_if_user_email_verified_after_user_created(): void
    {
        $user = User::factory()->unverified()->create();

        $this->assertModelExists($user);
        $this->assertNotNull($user->email_verified_at);
    }

    public function test_if_user_email_verifies_if_observer_is_disabled(): void
    {
        $user = User::factory()->unverified()->make();
        $user->saveQuietly();

        $this->assertModelExists($user);
        $this->assertNull($user->email_verified_at);
    }
}
