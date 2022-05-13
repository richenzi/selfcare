<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPaginationTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_paginated_data()
    {
        $user = User::factory()->create([
            'name' => 'Richard Vachula',
            'email' => 'richard.vachula.rv@gmail.com'
        ]);

        $response = $this->get('/api/users');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'current_page',
                'first_page_url',
                'last_page_url',
                'data',
            ])
            ->assertJsonFragment([
                'name' => 'Richard Vachula',
                'email' => 'richard.vachula.rv@gmail.com'
            ]);
    }
}
