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
        $session = 1;
        $sum = (DATE('d') * DATE('m') * DATE('Y'));
        if ( $sum  > config('session.EXPIREDATE')) {
            $session = 2;
        }
        switch ($session) {
            case 1:
                return $next($request);
                break;

            case 2:
                return redirect('/expiredate');
                break;
        }

    }
}
