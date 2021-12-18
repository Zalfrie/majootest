<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class RegisterTest extends TestCase
{

    use DatabaseMigrations;

    private $api = '/api/v1/auth';

    /** @test */
    public function newUserCanRegister()
    {
        $user = [
            'name' => 'Name',
            'user_name' => 'usernametest',
            'password' => 'foobar',
            'password_confirmation' => 'foobar'
        ];

        $response = $this->json('POST', $this->api . '/register', $user);
        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'user_name' => 'usernametest'
        ]);
    }

    /** @test */
    public function existingUserCannotRegister()
    {
        $existing_user = User::factory()->create();
        $user = [
            'name' => $existing_user->name,
            'user_name' => $existing_user->user_name,
            'password' => 'foobar',
            'password_confirmation' => 'foobar'
        ];
        $response = $this->json('POST', $this->api . '/register', $user);

        $response->assertStatus(422)->assertJson([
            'status' => 422,
            'errors' => [
                'user_name' => ['The user name has already been taken.']
            ]
        ]);
    }
}
