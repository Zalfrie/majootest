<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MerchantTest extends TestCase
{
    use DatabaseMigrations;

    private $apilogin = "/api/v1/auth";
    private $apimerchant = "/api/v1/report";

    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function userCanAccessMerchantEndPoint()
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
            $this->apimerchant . '/merchant',
            [],
            ['Authorization' => 'Bearer ' . $token]
        );

        $response->assertStatus(200);
    }
}
