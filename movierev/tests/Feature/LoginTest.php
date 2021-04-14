<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

use function PHPSTORM_META\map;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_form_logins_user()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->post('/login', [
                'email' => $user->email,
                'password' => 'password'
            ]);
        $this->assertAuthenticatedAs($user);
        $response->assertSee('Logout');
    }

    /** @test */
    public function login_user_without_password()
    {
        $user = User::factory()->create();
        $response = $this
            ->followingRedirects()
            ->post('/login', [
                'email' => $user->email,
            ]);
        $response->assertSee('Whoops! Please try to login again.');
    }

    /** @test */
    public function registering_user_succeeds()
    {
        $response = $this
            ->followingRedirects()
            ->post(
                '/register',
                [
                    'name' => 'test',
                    'email' => 'abc@123.se',
                    'password' => 'test123',
                    'password_confirmation' => 'test123'
                ]
            );
        $response->assertSee('Succesfully registered account!');
    }

    /** @test */
    public function registering_user_without_password()
    {
        $response = $this
            ->followingRedirects()
            ->post(
                '/register',
                [
                    'name' => 'test',
                    'email' => 'abc@123.se',
                    'password_confirmation' => 'test123'
                ]
            );
        $response->assertSee('The password field is required.');
    }
}
