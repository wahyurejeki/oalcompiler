<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_categories_success(): void
    {

        // Seed dependencies
        $category = new Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $response = $this
                         ->getJson('/categories?token=123456');

        $response->assertStatus(200);
    }

    public function test_show_category_success(): void
    {

        // Seed dependencies
        $category = new Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $response = $this
                         ->getJson('/categories/1?token=123456');

        $response->assertStatus(200);
    }

    public function test_create_category_success(): void
    {
        $response = $this
                         ->postJson('/categories?token=123456', ['name' => 'Test Name', 'description' => 'Test Description']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', [
            'name' => 'Test Name',
        ]);
    }

    public function test_update_category_success(): void
    {

        // Seed dependencies
        $category = new Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $response = $this
                         ->call('put', '/categories/1?token=123456', ['id' => 1, 'name' => 'Test Name', 'description' => 'Test Description']);

        $response->assertStatus(200);
    }

    public function test_delete_category_success(): void
    {

        // Seed dependencies
        $category = new Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $response = $this
                         ->call('delete', '/categories/1?token=123456', ['id' => 1]);

        $response->assertStatus(200);
    }
}
