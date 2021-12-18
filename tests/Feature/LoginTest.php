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
    public function registered_User_Can_Login()
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

    /**
     * @test Basic
     */
    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
