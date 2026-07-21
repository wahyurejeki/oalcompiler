<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Fine;
use App\Models\BorrowRecord;
use App\Models\Member;

class FineControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_fines_success(): void
    {

        // Seed dependencies
        $borrowRecord = new BorrowRecord();
        $borrowRecord->Book_id = 1;
        $borrowRecord->Member_id = 1;
        $borrowRecord->borrowedAt = '2026-07-15 10:00:00';
        $borrowRecord->dueDate = '2026-07-15 10:00:00';
        $borrowRecord->returnedAt = '2026-07-15 10:00:00';
        $borrowRecord->save();

        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $fine = new Fine();
        $fine->BorrowRecord_id = $borrowRecord->id;
        $fine->Member_id = $member->id;
        $fine->amount = 1.5;
        $fine->isPaid = 1;
        $fine->save();

        $response = $this
                         ->getJson('/fines?token=123456');

        $response->assertStatus(200);
    }

    public function test_list_fines_without_token(): void
    {
        $response = $this->getJson('/fines');
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_show_fine_success(): void
    {

        // Seed dependencies
        $borrowRecord = new BorrowRecord();
        $borrowRecord->Book_id = 1;
        $borrowRecord->Member_id = 1;
        $borrowRecord->borrowedAt = '2026-07-15 10:00:00';
        $borrowRecord->dueDate = '2026-07-15 10:00:00';
        $borrowRecord->returnedAt = '2026-07-15 10:00:00';
        $borrowRecord->save();

        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $fine = new Fine();
        $fine->BorrowRecord_id = $borrowRecord->id;
        $fine->Member_id = $member->id;
        $fine->amount = 1.5;
        $fine->isPaid = 1;
        $fine->save();

        $response = $this
                         ->getJson('/fines/1?token=123456');

        $response->assertStatus(200);
    }

    public function test_show_fine_without_token(): void
    {
        $response = $this->getJson('/fines/1');
        $response->assertJson(['error' => 'Token invalid']);
    }

    public function test_pay_fine_success(): void
    {

        // Seed dependencies
        $borrowRecord = new BorrowRecord();
        $borrowRecord->Book_id = 1;
        $borrowRecord->Member_id = 1;
        $borrowRecord->borrowedAt = '2026-07-15 10:00:00';
        $borrowRecord->dueDate = '2026-07-15 10:00:00';
        $borrowRecord->returnedAt = '2026-07-15 10:00:00';
        $borrowRecord->save();

        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $fine = new Fine();
        $fine->BorrowRecord_id = $borrowRecord->id;
        $fine->Member_id = $member->id;
        $fine->amount = 1.5;
        $fine->isPaid = 1;
        $fine->save();

        $response = $this
                         ->postJson('/fines/pay?token=123456', ['fineId' => $fine->id]);

        $response->assertStatus(200);
    }

    public function test_pay_fine_without_token(): void
    {
        $response = $this->postJson('/fines/pay', []);
        $response->assertJson(['error' => 'Token invalid']);
    }
}
