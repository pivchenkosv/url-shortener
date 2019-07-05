<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUrl;
use App\Http\Requests\Url;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class UrlController
 *
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckUrl::class)->only('store');
    }

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
        $url->code = getShortUrlById($url->id);
        $url->save();

        return redirect(route('urls.show', $url));
    }

    public function redirectUrl($code)
    {
        $link = Link::where('code', 'like', '%' . $code . '%')->firstOrFail();
        $link->increment('usage_quantity');

        return redirect($link->original_url);
    }
}
