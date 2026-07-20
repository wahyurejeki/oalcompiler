<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Reservation;
use App\Models\Member;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Book;

class ReservationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_reserve_book_success(): void
    {

        // Seed dependencies
        $member = new \App\Models\Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $category = new \App\Models\Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $publisher = new \App\Models\Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $book = new \App\Models\Book();
        $book->title = 'Test Title';
        $book->isbn = 'Test Isbn';
        $book->year = 1;
        $book->Category_id = $category->id;
        $book->Publisher_id = $publisher->id;
        $book->available = 1;
        $book->category_id = $category->id;
        $book->publisher_id = $publisher->id;
        $book->save();

        $response = $this
                         ->postJson('/reservations?token=123456', ['bookId' => $book->id, 'memberId' => $member->id, 'reservedAt' => '2026-07-15 10:00:00']);

        $response->assertStatus(200);
    }

    public function test_reserve_book_without_token(): void
    {
        $response = $this->postJson('/reservations', []);
        $response->assertJson(['error' => 'Token invalid']);
    }
}
