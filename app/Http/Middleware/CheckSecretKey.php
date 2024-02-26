<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSecretKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $key=$request->header('key');
        $password=$request->header('password');

/*
         if($key=='aygulen12.' && $password=='burakkaynar'){
            return $next($request);
        }
        else{
            return response()->json(['Lütfen Şifrenizi Kontrol Edin'],401);
        }
 */
        if($key=='aygulen12.')
        {
            if ($password=='burakkaynar'){
                return $next($request);
            }
            else
            {
                return  response()->json(['Şifrenizi Kontrol Ediniz'],401);
            }
        }
        else{
            return response()->json(['Şifrenizi Kontrol Ediniz'],401);
        }
    }
}
