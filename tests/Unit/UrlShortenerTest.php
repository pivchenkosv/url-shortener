<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlShortenerTest extends TestCase
{
    public function testShouldProperlyConvertIdToUrl()
    {
        $this->assertEquals(
            'dnh',
            getShortUrlById(12345)
        );
        $this->assertEquals(
            'b',
            getShortUrlById(00001)
        );
        $this->assertEquals(
            'Aa3',
            getShortUrlById(99999)
        );
    }
}
