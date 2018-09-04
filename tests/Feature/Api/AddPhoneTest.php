<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddPhoneTest extends TestCase
{
    use DatabaseMigrations,
        WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddPhone()
    {
        $parameters = [
            'name' => 'Anna',
            'phone' => '+79123456789',
            'comment' => 'text'
        ];

        $response = $this->post(action('Api\PhonesController@create'), $parameters);

        $response->assertStatus(201);
        $response->assertJsonFragment($parameters);
    }
}
