<?php

namespace Tests\Feature;

use Tests\TestCase;

class CartTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
    }
}
