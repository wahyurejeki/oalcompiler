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

    public function test_pay_fine_success(): void
    {

        // Seed dependencies
        $borrowRecord = new \App\Models\BorrowRecord();
        $borrowRecord->Book_id = 1;
        $borrowRecord->Member_id = 1;
        $borrowRecord->borrowedAt = '2026-07-15 10:00:00';
        $borrowRecord->dueDate = '2026-07-15 10:00:00';
        $borrowRecord->returnedAt = '2026-07-15 10:00:00';
        $borrowRecord->book_id = 1;
        $borrowRecord->member_id = 1;
        $borrowRecord->save();

        $member = new \App\Models\Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $fine = new \App\Models\Fine();
        $fine->BorrowRecord_id = $borrowRecord->id;
        $fine->Member_id = $member->id;
        $fine->amount = 1.5;
        $fine->isPaid = 1;
        $fine->borrowRecord_id = $borrowRecord->id;
        $fine->member_id = $member->id;
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
