<?php

namespace Tests\Unit;

use App\Models\Link;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutingTest extends TestCase
{
    public function testUrlIndex()
    {
        $this->get('/urls')->assertOk();
    }

    public function testUrlShow()
    {
        $url = Link::firstOrCreate(
            [
                'original_url' => 'http://example.com',
            ]
        );
        $url->code = getShortUrlById($url->id);
        $url->save();

        $this->get('/urls/1')->assertOk();
    }

    public function testRedirectUrl()
    {
        $response = $this->get('/b');
        $link = Link::whereCode('b')->first();
        $response->assertRedirect($link->original_url);
    }
}
