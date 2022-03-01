<?php

namespace App\Http\Middleware;

use Closure;

class Expiredate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = true;
        if (DATE('d') * DATE('m') * DATE('Y') > config('session.EXPIREDATE')) {
            $session = false;
        }

        if ($session){
            return $next($request);
        }else{
            return redirect('/expiredate');
        }
    }
}
