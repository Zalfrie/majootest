<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OutletTest extends TestCase
{
    use DatabaseMigrations;

    private $apilogin = "/api/vi/auth";
    private $apioutlet = "/api/v1/report";

    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function userCanAccessOutletEndPoint()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $credentials = [
            'user_name' => $user['user_name'],
            'password' => 'password'
        ];

        $response = $this->json('POST', $this->apilogin . '/login', $credentials);
        $token = $response->getData()->access_token;

        $response = $this->json(
            'GET',
            $this->apioutlet . '/outlet',
            [],
            ['Authorization' => 'Bearer ' . $token]
        );

        $response->assertStatus(500);
    }
}
