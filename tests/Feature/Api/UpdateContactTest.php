<?php

namespace Tests\Feature\Api;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class UpdateContactTest
 *
 * @package Tests\Feature\Api
 */
class UpdateContactTest extends TestCase
{
    use DatabaseMigrations,
        WithoutMiddleware;

    /**
     * Проверяет обновление телефона.
     *
     * @return void
     */
    public function testUpdatePhone()
    {
        $contact = factory(Contact::class)->create();
        $contactUpdated = factory(Contact::class)->make();

        $parameters = [
            'name' => $contactUpdated->name,
            'phone' => $contactUpdated->phone,
            'comment' => $contactUpdated->comment
        ];

        $response = $this->put(action('Api\ContactController@update', [$contact->id]), $parameters);

        $response->assertStatus(202);
        $response->assertJsonFragment($parameters);
    }
}
