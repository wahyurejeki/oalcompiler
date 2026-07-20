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
        $category = new \App\Models\Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $response = $this
                         ->getJson('/categories?token=123456');

        $response->assertStatus(200);
    }
}
