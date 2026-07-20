<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Book;
use App\Models\AuthorBook;
use App\Models\Member;
use App\Models\BorrowRecord;
use App\Models\Reservation;
use App\Models\Fine;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Category
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'name' => 'Demo Name ' . $i,
                'description' => 'Demo ' . 'description' . ' ' . $i,
            ]);
        }

        // Seed Publisher
        for ($i = 1; $i <= 10; $i++) {
            Publisher::create([
                'name' => 'Demo Name ' . $i,
                'address' => 'Demo ' . 'address' . ' ' . $i,
                'phone' => '08' . rand(100000000, 999999999),
            ]);
        }

        // Seed Author
        for ($i = 1; $i <= 10; $i++) {
            Author::create([
                'name' => 'Demo Name ' . $i,
                'biography' => 'Lorem ipsum dolor sit amet text description for ' . 'biography' . ' demo ' . $i,
                'birthDate' => now()->subDays(rand(1, 365))->format('Y-m-d'),
            ]);
        }

        // Seed Member
        for ($i = 1; $i <= 10; $i++) {
            Member::create([
                'name' => 'Demo Name ' . $i,
                'email' => 'email.' . $i . '@example.com',
                'phone' => '08' . rand(100000000, 999999999),
                'membershipDate' => now()->subDays(rand(1, 365))->format('Y-m-d'),
                'status' => 'Demo ' . 'status' . ' ' . $i,
            ]);
        }

        // Seed Book
        for ($i = 1; $i <= 10; $i++) {
            $category = \App\Models\Category::query()->inRandomOrder()->first();
            $publisher = \App\Models\Publisher::query()->inRandomOrder()->first();
            Book::create([
                'title' => 'Demo ' . 'title' . ' ' . $i,
                'isbn' => 'Demo ' . 'isbn' . ' ' . $i,
                'year' => rand(2000, 2026),
                'Category_id' => $category ? $category->id : null,
                'Publisher_id' => $publisher ? $publisher->id : null,
                'available' => rand(0, 1) == 1,
                'category_id' => $category ? $category->id : null,
                'publisher_id' => $publisher ? $publisher->id : null,
            ]);
        }

        // Seed AuthorBook
        for ($i = 1; $i <= 10; $i++) {
            $book = \App\Models\Book::query()->inRandomOrder()->first();
            $author = \App\Models\Author::query()->inRandomOrder()->first();
            AuthorBook::create([
                'Book_id' => $book ? $book->id : null,
                'Author_id' => $author ? $author->id : null,
                'book_id' => $book ? $book->id : null,
                'author_id' => $author ? $author->id : null,
            ]);
        }

        // Seed BorrowRecord
        for ($i = 1; $i <= 10; $i++) {
            $book = \App\Models\Book::query()->inRandomOrder()->first();
            $member = \App\Models\Member::query()->inRandomOrder()->first();
            BorrowRecord::create([
                'Book_id' => $book ? $book->id : null,
                'Member_id' => $member ? $member->id : null,
                'borrowedAt' => now()->subDays(rand(1, 365))->subHours(rand(1, 24)),
                'dueDate' => now()->subDays(rand(1, 365))->subHours(rand(1, 24)),
                'returnedAt' => now()->subDays(rand(1, 365))->subHours(rand(1, 24)),
                'book_id' => $book ? $book->id : null,
                'member_id' => $member ? $member->id : null,
            ]);
        }

        // Seed Reservation
        for ($i = 1; $i <= 10; $i++) {
            $book = \App\Models\Book::query()->inRandomOrder()->first();
            $member = \App\Models\Member::query()->inRandomOrder()->first();
            Reservation::create([
                'Book_id' => $book ? $book->id : null,
                'Member_id' => $member ? $member->id : null,
                'reservedAt' => now()->subDays(rand(1, 365))->subHours(rand(1, 24)),
                'status' => 'Demo ' . 'status' . ' ' . $i,
                'book_id' => $book ? $book->id : null,
                'member_id' => $member ? $member->id : null,
            ]);
        }

        // Seed Fine
        for ($i = 1; $i <= 10; $i++) {
            $borrowRecord = \App\Models\BorrowRecord::query()->inRandomOrder()->first();
            $member = \App\Models\Member::query()->inRandomOrder()->first();
            Fine::create([
                'BorrowRecord_id' => $borrowRecord ? $borrowRecord->id : null,
                'Member_id' => $member ? $member->id : null,
                'amount' => rand(10, 1000) . '.50',
                'isPaid' => rand(0, 1) == 1,
                'borrowRecord_id' => $borrowRecord ? $borrowRecord->id : null,
                'member_id' => $member ? $member->id : null,
            ]);
        }

    }
}
