<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_authors_success(): void
    {

        // Seed dependencies
        $author = new Author();
        $author->name = 'Test Name';
        $author->biography = 'Test Biography';
        $author->birthDate = '2026-07-15';
        $author->save();

        $response = $this
                         ->getJson('/authors?token=123456');

        $response->assertStatus(200);
    }

    public function test_show_author_success(): void
    {

        // Seed dependencies
        $author = new Author();
        $author->name = 'Test Name';
        $author->biography = 'Test Biography';
        $author->birthDate = '2026-07-15';
        $author->save();

        $response = $this
                         ->getJson('/authors/1?token=123456');

        $response->assertStatus(200);
    }

    public function test_create_author_success(): void
    {
        $response = $this
                         ->postJson('/authors?token=123456', ['name' => 'Test Name', 'biography' => 'Test Biography', 'birthDate' => '2026-07-15']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('authors', [
            'name' => 'Test Name',
        ]);
    }

    public function test_update_author_success(): void
    {

        // Seed dependencies
        $author = new Author();
        $author->name = 'Test Name';
        $author->biography = 'Test Biography';
        $author->birthDate = '2026-07-15';
        $author->save();

        $response = $this
                         ->call('put', '/authors/1?token=123456', ['id' => 1, 'name' => 'Test Name', 'biography' => 'Test Biography', 'birthDate' => '2026-07-15']);

        $response->assertStatus(200);
    }

    public function test_delete_author_success(): void
    {

        // Seed dependencies
        $author = new Author();
        $author->name = 'Test Name';
        $author->biography = 'Test Biography';
        $author->birthDate = '2026-07-15';
        $author->save();

        $response = $this
                         ->call('delete', '/authors/1?token=123456', ['id' => 1]);

        $response->assertStatus(200);
    }
}
