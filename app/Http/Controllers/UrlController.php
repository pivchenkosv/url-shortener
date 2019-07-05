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
        return view('home');
    }

    public function show(Url $url)
    {
        return view('linkInfo', compact('url'));
    }

    public function store(UrlFormRequest $request)
    {
        $original_url = $request->input('link');

        $url = Url::whereOriginalUrl($original_url)->firstOrCreate(
            [
                'original_url' => $original_url,
            ]
        );

        return redirect(route('urls.show', $url));
    }

    public function redirectUrl(Url $url)
    {
        $url->increment('usage_quantity');

        return redirect($url->original_url);
    }
}
