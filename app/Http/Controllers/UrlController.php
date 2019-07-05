<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUrl;
use App\Http\Requests\Url;
use App\Models\Link;

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

    public function show($url)
    {
        $link = Link::findOrFail($url);

        return view('linkInfo', compact('link'));
    }

    public function store(Url $request)
    {
        $request->validated();

        $original_url = $request->input('link');

        $url = Link::whereOriginalUrl($original_url)->firstOrCreate(
            [
                'original_url' => $original_url,
            ]
        );

        return redirect(route('urls.show', $url));
    }

    public function redirectUrl($code)
    {
        $link = Link::where('code', 'like', '%' . $code . '%')->firstOrFail();
        $link->increment('usage_quantity');

        return redirect($link->original_url);
    }
}
