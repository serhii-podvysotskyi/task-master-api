<?php

namespace Tests\Feature\Http;

use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\TestCase;

class UpTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_up_response(): void
    {
        $response = $this->get('/up');

        $response->assertStatus(Response::HTTP_OK);
    }
}
