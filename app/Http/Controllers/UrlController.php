<?php

namespace App\Http\Controllers;

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

        $pattern = "/^(https?:\/\/)|(www.)/";

        $original_url = preg_replace($pattern, 'http://', $request->input('link'));

        $url = Link::whereOriginalUrl('http://' . $original_url)->first();

        if ($url) {
            return redirect(route('urls.show', $url));
        }

        $original_url = preg_match($pattern, $request->input('link')) ?
            $request->input('link') :
            'http://' . $request->input('link');


        $url = Link::create(['original_url' => $original_url]);
        $url->code = getShortUrlById($url->id);

        if ($url->save()) {
            return redirect(route('urls.show', $url));
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'An error occurred!'
            ],
            500
        );
    }

    public function redirectUrl($code)
    {
        $link = Link::where('code', 'like', '%' . $code . '%')->firstOrFail();
        $link->increment('usage_quantity');

        return redirect($link->original_url);
    }
}
