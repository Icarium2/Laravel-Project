<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_profile()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertSee($user->name);
        $response->assertSee('Account Settings');
    }

    /** @test */
    public function show_settings_forms()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/settings');

        $response->assertSee('Old Password');
        $response->assertSee('New Password');
        $response->assertSee('Confirm New Password');
        $response->assertSee('Upload Avatar');
        $response->assertSee('Delete Account');
    }

    /** @test */
    public function update_user_info()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->post('/user/update', [
                'currentPassword'  => $user->password,
                'password'         => 'updated',
                'password_confirm' => 'updated',
                'email'            => 'example@example.com',
            ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function upload_avatar()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->patch('user/upload', [
                'avatar' => 'fakeUrl',
            ]);

        $response->assertStatus(200);
        // Not sure how to test this without a file
    }
}
