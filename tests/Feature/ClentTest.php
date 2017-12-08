<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\Rule;
use Validator;

class ClentTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRecordIsCreated()
    {
        $client = factory('App\Client', 10)->create();

        $response = $this->json('POST', '/clients', $client->toArray());

        $response
            ->assertStatus(302);
    }

    public function testEmailMustBeUnique()
    {
        $client = factory('App\Client', 1)->create([
            'email' => 'p@mohan.com'
        ]);

        $response = $this->json('POST', '/clients', $client->toArray());

        $response
           ->assertSessionHasErrors('email')
           ->assertStatus(302);
   }

    public function testNameIsRequired()
    {
        $data = 
        [
            'gender' => 'female',
            'dob' => '1986-05-15',
            'phone' => '9900655798',
            'email' => 'p@mohan.com',
            'address' => 'abc 123 3454546 465xfsfds',
            'nationality' => 'India',
            'education' => 'MBA',
            'preferred_contact_mode' => 'none'
        ];

        $response = $this->json('POST', '/clients', $data);

        // $errors = session('errors');
// $this->assertSessionHasErrors();
        // $this->assertEquals($errors->get('name')[0],"Your error message for validation");
        $response
           ->assertSessionHasErrors('name')
           ->assertStatus(302);
    }

    public function testGenderMustBeInGivenList()
    {
        $data = 
        [
            'name' => 'pm',
            'gender' => 'femalerr',
            'dob' => '1986-05-15',
            'phone' => '9900655798',
            'email' => 'p@mohan.com',
            'address' => 'abc 123 3454546 465xfsfds',
            'nationality' => 'India',
            'education' => 'MBA',
            'preferred_contact_mode' => 'none'
        ];

        $response = $this->json('POST', '/clients', $data);

        $response
           ->assertSessionHasErrors('gender')
           ->assertStatus(302);

        // $errors = session('errors');
           // $this->assertSessionHasErrors();
        // $this->assertEquals($errors->get('gender')[0],"The selected gender is invalid.");
    }
}
