<?php

namespace Tests\Feature;

use App\Models\Url;
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
            route('urls.store'),
            [
                'link' => 'http://example.com',
            ]
        );
        $this->assertDatabaseHas('links', ['original_url' => 'http://example.com']);
        $link = Url::whereOriginalUrl('http://example.com')->first();

        $response->assertRedirect(route('urls.show', ['url' => $link->id]));
    }

    public function testReturnsErrorMessage()
    {
        $this->post(
            route('urls.store'),
            [
                'link' => 'example.com',
            ]
        )->assertSessionHasErrors('link');

        $this->post(
            route('urls.store'),
            [
                'link' => 'qwerty',
            ]
        )->assertSessionHasErrors('link');

        $this->post(
            route('urls.store'),
            [
                'link' => 'http://https://example.com',
            ]
        )->assertSessionHasErrors('link');
    }
}
