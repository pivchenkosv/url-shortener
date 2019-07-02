<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function getShortUrlById;
use Illuminate\Routing\Redirector;

/**
 * Class UrlController
 *
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['link' => 'exists:links,code']);

        if ($request->has('link')) {
            $code = $request->input('link');
            $link = Link::where('code', 'like', '%' . $code . '%')->first();

            return view('linkInfo', compact('link'));
        }

        return view('home');
    }

    /**
     * Generates short URL
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createUrl(Request $request)
    {
        $request->validate(Link::rules());

        $pattern = "/^(https?:\/\/)/";

        $original_url = preg_replace($pattern, '', $request->input('link'));

        $link = Link::whereIn(
            'original_url',
            [
                $original_url,
                'http://' . $original_url,
                'https://' . $original_url,
            ]
        )->first();

        if ($link) {
            return redirect()
                ->action('UrlController@index', ['link' => $link->code]);
        }

        $original_url = preg_match($pattern, $request->input('link')) ?
            $request->input('link') :
            'http://' . $request->input('link');


        $link = Link::create(['original_url' => $original_url]);
        $link->code = getShortUrlById($link->id);

        if ($link->save()) {
            return redirect()
                ->action('UrlController@index', ['link' => $link->code]);
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'An error occurred!'
            ],
            500
        );
    }

    /**
     * Redirects to the original URL using short URL.
     *
     * @param string $code Short URL code
     *
     * @return RedirectResponse|Redirector
     */
    public function redirectToOriginalUrl($code)
    {
        $link = Link::where('code', 'like', '%' . $code . '%')->get()->first();

        if ($link) {
            $pattern = "/^(https?:\/\/)/";
            $original_url = preg_match($pattern, $link->original_url) ?
                $link->original_url :
                'http://' . $link->original_url;

            $link->increment('usage_quantity');

            return redirect($original_url);
        }

        return redirect('/')->withErrors(['Url expired or does not exist.']);
    }
}
