<?php

namespace Tests\Feature;

use App\Models\Journal;
use App\Models\Shipping;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JournalControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_it_can_display_the_journal_index_page()
    {
        $shippingId = Shipping::first()->id;
        $response = $this->get(route('journals.index',$shippingId));
        $response->assertStatus(200);
        $response->assertViewIs('journal.all');
        $response->assertViewHas('allJournal');
    }

    public function test_it_can_display_the_create_journal_page()
    {
        $shippingId = Shipping::first()->id;
        $response = $this->get(route('journals.create',$shippingId));
        $response->assertStatus(200);
        $response->assertViewIs('journal.create');
    }


    public function test_it_can_delete_a_Journal()
    {
        $journalId = Journal::first()->id;
        $shippingId = Shipping::first()->id;

        $response = $this->delete(route('journals.destory', $journalId));
        $response->assertRedirect(route('journals.index', $shippingId));
        $response->assertSessionHas('success', 'Journal Deleted Successfully');
        $this->assertDatabaseMissing('journals', ['id' => $journalId]);
    }
}
