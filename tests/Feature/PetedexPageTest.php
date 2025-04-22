<?php

namespace Tests\Feature;

use Tests\TestCase;

class PetedexPageTest extends TestCase
{
    /**
     * Test that the Petédex page loads successfully and returns a 200 status.
     */
    public function testPageLoadsSuccessfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test that the title is 'Petédex | Home'.
     */
    public function testTitleIsCorrect()
    {
        $response = $this->get('/');
        $response->assertSeeInOrder([
            '<title>Petédex | Home</title>',
        ]);
    }

    /**
     * Test that the page contains the search input.
     */
    public function testSearchBarExists()
    {
        $response = $this->get('/');
        $response->assertSee('id="searchInput"', false);
    }
}
