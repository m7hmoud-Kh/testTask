<?php

namespace Tests\Feature;

use App\Models\Shipping;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ShippingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_it_can_display_the_shipping_index_page()
    {
        $response = $this->get(route('shipping.index'));
        $response->assertStatus(200);
        $response->assertViewIs('shipping.all');
        $response->assertViewHas('allShipping');
    }

    public function test_it_can_display_the_create_shipping_page()
    {
        $response = $this->get(route('shipping.create'));
        $response->assertStatus(200);
        $response->assertViewIs('shipping.create');
    }


    public function test_it_can_display_the_edit_shipping_page()
    {
        $shipping = Shipping::first();
        $response = $this->get(route('shipping.edit', $shipping));
        $response->assertStatus(200);
        $response->assertViewIs('shipping.edit');
        $response->assertViewHas('shipping', $shipping);
    }

    public function test_it_can_delete_a_shipping()
    {
        $shipping = Shipping::first();
        $response = $this->delete(route('shipping.destroy', $shipping));
        $response->assertRedirect(route('shipping.index'));
        $response->assertSessionHas('success', 'Shipping Deleted Successfully');
        $this->assertDatabaseMissing('shippings', ['id' => $shipping->id]);
    }

}
