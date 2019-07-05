<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * Test asserts that short url has been created
     * and user is redirected to the page with short url info.
     *
     * @return void
     */
    public function testShouldCreateShortUrl()
    {
        $response = $this->post(
            '/urls',
            [
                'link' => 'http://example.com',
            ]
        );
        $this->assertDatabaseHas('links', ['original_url' => 'http://example.com']);
        $link = Link::whereOriginalUrl('http://example.com')->first();

        $response->assertRedirect('/urls/' . $link->id);
    }

    public function testReturnsErrorMessage()
    {
        $this->post(
            '/urls',
            [
                'link' => 'example.com',
            ]
        )->assertSessionHasErrors('link');

        $this->post(
            '/urls',
            [
                'link' => 'qwerty',
            ]
        )->assertSessionHasErrors('link');

        $this->post(
            '/urls',
            [
                'link' => 'http://https://example.com',
            ]
        )->assertSessionHasErrors('link');
    }
}
