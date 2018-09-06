<?php

namespace Tests\Feature\Api;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class DestroyContactTest
 * @package Tests\Feature\Api
 */
class DestroyContactTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Проверяет удаление записи.
     */
    public function testDeleteContact()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->delete(action('Api\ContactController@destroy', [$contact->id]));

        $response->assertStatus(202);
        $response->assertJsonFragment(['success' => true]);
    }
}
