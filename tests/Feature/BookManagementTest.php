<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;
use App\Models\User;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_create_book()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
             ->post('/book-store', [
                 'title' => 'New Book',
                 'author' => 'Author Name',
             ])
             ->assertStatus(201);

        $this->assertDatabaseHas('books', ['title' => 'New Book']);
    }
}
