<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Reservation;
use App\Models\Book;
use App\Models\Member;
use App\Models\Category;
use App\Models\Publisher;

class ReservationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_reservations_success(): void
    {

        // Seed dependencies
        $book = new Book();
        $book->title = 'Test Title';
        $book->isbn = 'Test Isbn';
        $book->year = 1;
        $book->Category_id = 1;
        $book->Publisher_id = 1;
        $book->available = 1;
        $book->save();

        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $reservation = new Reservation();
        $reservation->Book_id = $book->id;
        $reservation->Member_id = $member->id;
        $reservation->reservedAt = '2026-07-15 10:00:00';
        $reservation->status = 'Test Status';
        $reservation->save();

        $response = $this
                         ->getJson('/reservations?token=123456');

        $response->assertStatus(200);
    }

    public function test_list_reservations_without_token(): void
    {
        $response = $this->getJson('/reservations');
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_show_reservation_success(): void
    {

        // Seed dependencies
        $book = new Book();
        $book->title = 'Test Title';
        $book->isbn = 'Test Isbn';
        $book->year = 1;
        $book->Category_id = 1;
        $book->Publisher_id = 1;
        $book->available = 1;
        $book->save();

        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $reservation = new Reservation();
        $reservation->Book_id = $book->id;
        $reservation->Member_id = $member->id;
        $reservation->reservedAt = '2026-07-15 10:00:00';
        $reservation->status = 'Test Status';
        $reservation->save();

        $response = $this
                         ->getJson('/reservations/1?token=123456');

        $response->assertStatus(200);
    }

    public function test_show_reservation_without_token(): void
    {
        $response = $this->getJson('/reservations/1');
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_reserve_book_success(): void
    {

        // Seed dependencies
        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $category = new Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $publisher = new Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $book = new Book();
        $book->title = 'Test Title';
        $book->isbn = 'Test Isbn';
        $book->year = 1;
        $book->Category_id = $category->id;
        $book->Publisher_id = $publisher->id;
        $book->available = 1;
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

    public function test_cancel_reservation_success(): void
    {

        // Seed dependencies
        $book = new Book();
        $book->title = 'Test Title';
        $book->isbn = 'Test Isbn';
        $book->year = 1;
        $book->Category_id = 1;
        $book->Publisher_id = 1;
        $book->available = 1;
        $book->save();

        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $reservation = new Reservation();
        $reservation->Book_id = $book->id;
        $reservation->Member_id = $member->id;
        $reservation->reservedAt = '2026-07-15 10:00:00';
        $reservation->status = 'Test Status';
        $reservation->save();

        $response = $this
                         ->call('delete', '/reservations/1?token=123456', ['id' => 1]);

        $response->assertStatus(200);
    }

    public function test_cancel_reservation_without_token(): void
    {
        $response = $this->postJson('/reservations/1', []);
        $response->assertJson(['error' => 'Token invalid']);
    }
}
