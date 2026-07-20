<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
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

        // Seed dependencies
        $category = new \App\Models\Category();
        $category->name = 'Test Name';
        $category->description = 'Test Description';
        $category->save();

        $publisher = new \App\Models\Publisher();
        $publisher->name = 'Test Name';
        $publisher->address = 'Test Address';
        $publisher->phone = 'Test Phone';
        $publisher->save();

        $response = $this
                         ->postJson('/books?token=123456', ['title' => 'Test Title', 'isbn' => 'Test Isbn', 'year' => 1, 'categoryId' => $category->id, 'publisherId' => $publisher->id]);

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
                         ->postJson('/books/borrow?token=123456', ['bookId' => $book->id, 'dueDate' => '2026-07-15 10:00:00', 'memberId' => $member->id, 'borrowedAt' => '2026-07-15 10:00:00']);

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
        $book->isbn = 'Test Isbn';
        $book->year = 1;
        $book->Category_id = 1;
        $book->Publisher_id = 1;
        $book->available = 1;
        $book->category_id = 1;
        $book->publisher_id = 1;
        $book->save();

        $member = new \App\Models\Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $borrowRecord = new \App\Models\BorrowRecord();
        $borrowRecord->Book_id = $book->id;
        $borrowRecord->Member_id = $member->id;
        $borrowRecord->borrowedAt = '2026-07-15 10:00:00';
        $borrowRecord->dueDate = '2026-07-15 10:00:00';
        $borrowRecord->returnedAt = '2026-07-15 10:00:00';
        $borrowRecord->book_id = $book->id;
        $borrowRecord->member_id = $member->id;
        $borrowRecord->save();

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
                         ->postJson('/books/return?token=123456', ['bookId' => $book->id, 'returnedAt' => '2026-07-15 10:00:00']);

        $response->assertStatus(200);
    }

    public function test_return_book_without_token(): void
    {
        $response = $this->postJson('/books/return', []);
        $response->assertJson(['error' => 'Token invalid']);
    }
}
