<?php

namespace Tests\Feature\Api;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ShowAllContactTest
 * @package Tests\Feature\Api
 */
class ShowAllContactTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Проверяет возврат всех контактов.
     */
    public function testShowAllContact()
    {
        $contact = factory(Contact::class, 5)->create();

        $response = $this->get(action('Api\ContactController@index'));

        $response->assertStatus(200);
        $response->assertJsonFragment($contact->first()->toArray());
    }
}
