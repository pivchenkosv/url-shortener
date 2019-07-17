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
                'original_url' => 'http://example.com',
            ]
        );
        $this->assertDatabaseHas('links', ['original_url' => 'http://example.com']);
        $link = Url::whereOriginalUrl('http://example.com')->first();

        $response->assertJson(['success' => true]);
    }

    public function testReturnsErrorMessage()
    {
        $response = $this->json('POST', '/urls', ['original_url' => 'example.com']);
        $response->assertJsonValidationErrors('original_url')->assertStatus(422);

        $response = $this->json('POST', '/urls', ['link' => 'www.example']);
        $response->assertJsonValidationErrors('original_url')->assertStatus(422);

        $response = $this->json('POST', '/urls', ['original_url' => 'http://https://example.com']);
        $response->assertJsonValidationErrors('original_url')->assertStatus(422);
    }
}
