<?php

namespace Tests\Feature;

use App\Models\Url;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testUrlIndex()
    {
        $this->get(route('urls.index'))->assertOk();
    }

    public function testUrlShow()
    {
        $url = Url::firstOrCreate(
            [
                'original_url' => 'http://example.com',
            ]
        );
        $url->code = getShortUrlById($url->id);
        $url->save();

        $this->get(route('urls.show', ['url' => 1]))->assertOk();
    }

    public function testRedirectUrl()
    {
        $response = $this->get('/b');
        $link = Url::whereCode('b')->first();
        $response->assertRedirect($link->original_url);
    }
}
