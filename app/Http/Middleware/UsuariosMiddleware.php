<?php

namespace App\Http\Middleware;

use Closure;

class UsuariosMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$active) {
        $active = 1;
        if ($active == 1) {
            return $next($request);
        }
        return redirect('/');
    }

}
