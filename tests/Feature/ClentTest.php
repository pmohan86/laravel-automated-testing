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

    // public function testDatabase()
    // {
    // 	$clients = factory('App\Client', 10)->create();
    // }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHttp()
    {
        $response = $this->json('POST', '/clients', 
            [
                'name' => 'abc',
                'gender' => 'female',
                'dob' => '1986-05-22',
                'phone' => '9920656788',
                'email' => 'pmohan_86@yahoo.com',
                'address' => 'abc 123 3454546 465xfsfds ddgs',
                'nationality' => 'India',
                'education' => 'MBA',
                'preferred_contact_mode' => 'none'
        ]);

        dd($response);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
