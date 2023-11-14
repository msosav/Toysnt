<?php

namespace Tests\Feature;

use Tests\TestCase;

class ToyTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/toys');

        $response->assertStatus(200);
    }
}
