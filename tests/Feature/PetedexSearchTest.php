<?php

namespace Feature;

use Tests\TestCase;

class PetedexSearchTest extends TestCase
{
    /**
     * Test that the Petédex page loads successfully and returns a 200 status.
     */
    public function testPageLoadsSuccessfully()
    {
        $response = $this->get('/search?search=cat');
        $response->assertStatus(200);
    }
}
