<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
                'link' => 'example.com',
            ]
        );
        $this->assertDatabaseHas('links', ['original_url' => 'http://example.com']);
        $link = Link::whereOriginalUrl('http://example.com')->latest('id')->first();

        $response->assertRedirect('/urls/' . $link->id);
    }
}
