<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use function getShortUrlById;
use function getUrlIdentifier;

class UrlController extends Controller
{
    public function getShortUrl(Request $request)
    {
        return response()->json(['success' => true, 'data' => [getShortUrlById(12345), getUrlIdentifier('dnh')]]);
    }

    public function createUrl(Request $request)
    {
        $link = Link::create(
            [
            'original_url' => $request->input('original_url')
            ]
        );
        $link->code = getShortUrlById($link->id);
        $link->save();
        return response()->json(['success' => true, 'data' => Link::find($link->id)]);
    }
}
