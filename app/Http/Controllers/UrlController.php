<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlFormRequest;
use App\Models\Url;

/**
 * Class UrlController
 *
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 'data' => Url::all()]);
    }

    public function show(Url $url)
    {
        return response()->json(['success' => true, 'data' => $url]);
    }

    public function store(UrlFormRequest $request)
    {
        $original_url = $request->input('original_url');

        $url = Url::whereOriginalUrl($original_url)->firstOrCreate([
                'original_url' => $original_url,
        ]);

        return response()->json(['success' => true, 'data' => $url]);
    }

    public function redirectUrl(Url $url)
    {
        $url->increment('usage_quantity');

        return response()->json(['success' => true, 'data' => $url]);
    }
}
