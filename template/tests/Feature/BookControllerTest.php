<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use App\Models\Member;
use App\Models\BorrowRecord;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_success(): void
    {
        $response = $this
                         ->getJson('/?token=123456');

        $response->assertStatus(200);
    }

    public function test_list_books_success(): void
    {

        // Seed dependencies
        $book = new \App\Models\Book();
        $book->title = 'Test Title';
        $book->author = 'Test Author';
        $book->year = 1;
        $book->isbn = 'Test Isbn';
        $book->available = 1;
        $book->save();

        $response = $this
                         ->getJson('/books?token=123456');

        $response->assertStatus(200);
    }

    public function test_list_books_without_token(): void
    {
        $response = $this->getJson('/books');
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_create_book_success(): void
    {
        $response = $this
                         ->postJson('/books?token=123456', ['title' => 'Test Title', 'author' => 'Test Author', 'year' => 1, 'isbn' => 'Test Isbn']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', [
            'title' => 'Test Title',
        ]);
    }

    public function test_create_book_without_token(): void
    {
        $response = $this->postJson('/books', []);
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_borrow_book_success(): void
    {

        // Seed dependencies
        $book = new \App\Models\Book();
        $book->title = 'Test Title';
        $book->author = 'Test Author';
        $book->year = 1;
        $book->isbn = 'Test Isbn';
        $book->available = 1;
        $book->save();

        $member = new \App\Models\Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->save();

        $response = $this
                         ->postJson('/books/borrow?token=123456', ['isbn' => 'Test Isbn', 'memberId' => $member->id, 'borrowedAt' => '2026-07-15 10:00:00']);

        $response->assertStatus(200);
    }

    public function test_borrow_book_without_token(): void
    {
        $response = $this->postJson('/books/borrow', []);
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_return_book_success(): void
    {

        // Seed dependencies
        $book = new \App\Models\Book();
        $book->title = 'Test Title';
        $book->author = 'Test Author';
        $book->year = 1;
        $book->isbn = 'Test Isbn';
        $book->available = 1;
        $book->save();

        $member = new \App\Models\Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->save();

        $borrowRecord = new \App\Models\BorrowRecord();
        $borrowRecord->book_id = $book->id;
        $borrowRecord->member_id = $member->id;
        $borrowRecord->borrowedAt = '2026-07-15 10:00:00';
        $borrowRecord->returnedAt = '2026-07-15 10:00:00';
        $borrowRecord->save();

        $response = $this
                         ->postJson('/books/return?token=123456', ['bookId' => $book->id, 'memberId' => $member->id, 'returnedAt' => '2026-07-15 10:00:00']);

        $response->assertStatus(200);
    }

    public function test_return_book_without_token(): void
    {
        $response = $this->postJson('/books/return', []);
        $response->assertJson(['error' => 'Token invalid']);
    }
}
