<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testDatabase()
    {
    	$clients = factory('App\Client', 10)->create();

    	$this->assertDatabaseHas('clients', $clients->toArray());
    }
}
