<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
    public function test_it_creates_new_user()
    {
        $response = $this->get('/api/users');

        $response->assertOk()->assertJsonFragment([
            "name" => "Richard Vachula",
            "email" => "richard.vachula.rv@gmail.com"
        ]);
    }
}
