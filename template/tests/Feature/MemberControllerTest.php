<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Member;

class MemberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_members_success(): void
    {

        // Seed dependencies
        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $response = $this
                         ->getJson('/members?token=123456');

        $response->assertStatus(200);
    }

    public function test_show_member_success(): void
    {

        // Seed dependencies
        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $response = $this
                         ->getJson('/members/1?token=123456');

        $response->assertStatus(200);
    }

    public function test_register_member_success(): void
    {
        $response = $this
                         ->postJson('/members?token=123456', ['name' => 'Test Name', 'email' => 'Test Email', 'phone' => 'Test Phone', 'membershipDate' => '2026-07-15']);

        $response->assertStatus(200);
    }

    public function test_update_member_success(): void
    {

        // Seed dependencies
        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $response = $this
                         ->call('put', '/members/1?token=123456', ['id' => 1, 'name' => 'Test Name', 'email' => 'Test Email', 'phone' => 'Test Phone', 'status' => 'Test Status']);

        $response->assertStatus(200);
    }

    public function test_delete_member_success(): void
    {

        // Seed dependencies
        $member = new Member();
        $member->name = 'Test Name';
        $member->email = 'Test Email';
        $member->phone = 'Test Phone';
        $member->membershipDate = '2026-07-15';
        $member->status = 'Test Status';
        $member->save();

        $response = $this
                         ->call('delete', '/members/1?token=123456', ['id' => 1]);

        $response->assertStatus(200);
    }
}
