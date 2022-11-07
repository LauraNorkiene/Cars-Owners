<?php

namespace App\Http\Middleware;

use App\Models\ShortCode;
use Closure;
use Illuminate\Http\Request;

class ShortCodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        ///Kodas vykdomas pries krovima
        $response = $next($request);
        //Kodas vykdomas po krovimo
        $html = $response->content();

        $codes = ShortCode::all();
        foreach ($codes as $code) {

            $html = str_replace($code->shortcode, $code->replace, $html);
            $response->setContent($html);
            return $response;
        }
    }
}
