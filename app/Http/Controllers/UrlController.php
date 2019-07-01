<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use function getShortUrlById;
use function getUrlIdentifier;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('link')) {
            $link = Link::whereCode($request->input('link'))->first();

            return view(
                'linkInfo',
                [
                    'shortUrl' => $link->code,
                    'originalUrl' => $link->original_url,
                    'usage_quantity' => $link->usage_quantity,
                ]
            );
        } else {
            return view('home');
        }
    }

    /**
     * Generates short URL
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUrl(Request $request)
    {
        $link = Link::create(
            [
                'original_url' => $request->input('link')
            ]
        );
        $link->code = getShortUrlById($link->id);

        if ($link->save()) {
            return redirect()->action('UrlController@index', ['link' => $link->code]);
        }
    }

    public function redirectToOriginalUrl($url)
    {
        $link = Link::where(DB::raw('BINARY `code`'), $url)->first();
        if ($link) {
            return redirect($link->original_url);
        } else {
            abort(404);
        }
    }
}
