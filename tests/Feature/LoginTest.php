<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    private $api = "/api/v1/auth";

    /** @test */
    public function registeredUserCanLogin()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $credentials = [
            'user_name' => $user['user_name'],
            'password' => 'password'
        ];

        $response = $this->json('POST', $this->api .'/login', $credentials);
        $response->assertStatus(200);
        $this->assertNotNull($response->getData()->access_token);
    }

    /** @test */
    public function unregisteredUserCannotLogin()
    {
        $credentials = [
            'user_name' => 'test',
            'password' => 'password'
        ];

        $response = $this->json('POST', $this->api .'/login', $credentials);
        $response->assertStatus(401)->assertJson([
            'status' => 401,
            'errors' => [
                'Unauthorized.'
            ]
        ]);
    }

    /**
     * @test Basic
     */
    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
