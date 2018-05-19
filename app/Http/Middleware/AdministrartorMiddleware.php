<?php

namespace App\Http\Middleware;

use Closure;

class AdministrartorMiddleware
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
        if($request->user()->role->role != 'Administrador'){
            \Session::flash('danger', 'Usuario no autorizado');
            return redirect('home');
        }

        return $next($request);
    }
}
