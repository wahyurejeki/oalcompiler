<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Publisher;

class PublisherControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_publishers_success(): void
    {

        // Seed dependencies
        $publisher = new Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $response = $this
                         ->getJson('/publishers?token=123456');

        $response->assertStatus(200);
    }

    public function test_show_publisher_success(): void
    {

        // Seed dependencies
        $publisher = new Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $response = $this
                         ->getJson('/publishers/1?token=123456');

        $response->assertStatus(200);
    }

    public function test_create_publisher_success(): void
    {
        $response = $this
                         ->postJson('/publishers?token=123456', ['name' => 'Test Name', 'address' => 'Test Address', 'phone' => 'Test Phone']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('publishers', [
            'name' => 'Test Name',
        ]);
    }

    public function test_update_publisher_success(): void
    {

        // Seed dependencies
        $publisher = new Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $response = $this
                         ->call('put', '/publishers/1?token=123456', ['id' => 1, 'name' => 'Test Name', 'address' => 'Test Address', 'phone' => 'Test Phone']);

        $response->assertStatus(200);
    }

    public function test_delete_publisher_success(): void
    {

        // Seed dependencies
        $publisher = new Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $response = $this
                         ->call('delete', '/publishers/1?token=123456', ['id' => 1]);

        $response->assertStatus(200);
    }
}
