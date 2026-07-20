<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Member;

class MemberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_member_success(): void
    {
        $response = $this
                         ->postJson('/members?token=123456', ['name' => 'Test Name', 'email' => 'Test Email', 'phone' => 'Test Phone', 'membershipDate' => '2026-07-15']);

        $response->assertStatus(200);
    }
}
