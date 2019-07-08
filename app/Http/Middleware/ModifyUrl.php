<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ModifyUrl
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $pattern = "/^(https?:\/\/(www\.)?)|(www\.)/";
        $request->merge(['link' => preg_replace($pattern, 'http://', $request->input('link'))]);

        return $next($request);
    }
}
