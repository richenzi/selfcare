<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_paginated_data()
    {
        $user = User::factory()->create([
            'name' => 'Richard Vachula',
            'email' => 'richard.vachula.rv@gmail.com'
        ]);

        $response = $this->delete("/api/users/{$user->id}");

        $response->assertNoContent();

        $this->assertSoftDeleted($user);
    }
}
