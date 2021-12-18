<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LogoutTest extends TestCase
{
    use DatabaseMigrations;

    private $api = '/api/v1/auth';

    /** @test */
    public function tokenCanBeLoggedOut()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $credentials = [
            'user_name' => $user['user_name'],
            'password' => 'password'
        ];

        $response = $this->json('POST', $this->api . '/login', $credentials);
        $token = $response->getData()->access_token;

        $response = $this->json(
            'POST',
            $this->api . '/logout',
            [],
            ['Authorization' => 'Bearer ' . $token]
        );

        $message = $response->getData()->message;
        $this->assertEquals("Successfully logged out.", $message);
    }

    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
