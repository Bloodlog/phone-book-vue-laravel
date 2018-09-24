<?php

namespace Tests\Feature\Api;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ShowContactTest
 * @package Tests\Feature\Api
 */
class ShowContactTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Проверяет возвращение одной записи контакта.
     */
    public function testShow()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->get(action('Api\ContactController@show', [$contact->id]));

        $response->assertStatus(202);
        $response->assertJsonFragment(['data' => [$contact->toArray()]]);
    }

}
