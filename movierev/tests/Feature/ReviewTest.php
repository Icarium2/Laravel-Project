<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function posting_a_review_succeeds()
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->post('/review', [
                'movie_id' => '399566',
                'content' => 'Testing 123'
            ]);

        $response->assertSee('Testing 123');
    }

    /** @test */
    public function updating_a_review()
    {
        $user = User::factory()->create();
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->patch('/review/' . $review->id . '/update', [
                'content' => 'update'
            ]);

        $this->assertDatabaseHas('reviews', [
            'content' => 'update'
        ]);
    }

    /** @test */
    public function deleting_a_review()
    {
        $user = User::factory()->create();
        $review = Review::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->delete('review/' . $review->id . '/delete');

        $this->assertDeleted('reviews', [
            'content' => $review->content
        ]);
    }
}
