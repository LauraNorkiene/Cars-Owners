<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShortCode
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
        $response= $next($request);
        //Kodas vykdomas po krovimo
        $html= $response->content();

        $codes=ShortCode::all();
        foreach ($codes as $code){
            echo $code->shortcode;
            if (strstr($request->shortcode,$code->shortcode)){
                return  $response->setContent(str_replace($code->shortcode, $code->replace, $html));
            }
        }

        return $response;
}
}
