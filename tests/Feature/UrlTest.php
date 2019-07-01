<?php

namespace Tests\Feature;

use App\Models\Link;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlTest extends TestCase
{
    /**
     * Test asserts that short url has been created
     * and user is redirected to the page with short url info.
     *
     * @return void
     */
    public function testShouldCreateShortUrl()
    {
        $response = $this->post('/urls', ['link' => 'www.example.com']);
        $this->assertDatabaseHas('links', ['original_url' => 'www.example.com']);
        $link = Link::whereOriginalUrl('www.example.com')->latest('id')->first();

        $response->assertRedirect('/?link=' . $link->code);
    }
}
