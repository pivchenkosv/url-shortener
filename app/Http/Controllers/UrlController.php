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
        $validator = Validator::make(
            $request->all(),
            [
                'link' => 'exists:links,code'
            ]
        );
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator, 'link')
                ->withInput();
        }
        if ($request->has('link')) {
            $code = $request->input('link');
            $link = Link::where('code', 'like', '%' . $code . '%')->first();

            return view(
                'linkInfo',
                [
                    'shortUrl' => $link->code,
                    'originalUrl' => $link->original_url,
                    'usage_quantity' => $link->usage_quantity,
                ]
            );
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

        $link = Link::create(['original_url' => $request->input('link')]);
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
        $link = Link::where('code', 'like', '%' . $url . '%')->first();
        if ($link) {
            $link->increment('usage_quantity');
            return redirect($link->original_url);
        }

        abort(404);
    }
}
