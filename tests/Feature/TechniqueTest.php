<?php

namespace Tests\Feature;

use Tests\TestCase;

class TechniqueTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/techniques');

        $response->assertStatus(200);
    }
}
