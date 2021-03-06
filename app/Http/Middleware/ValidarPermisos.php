<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ValidarPermisos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        // return $next($request);
        // dd(session("permisos"));
        //Validaciones por medio de middleware
        if(session("permisos") != null) {
            // $url = explode("?", $request->getRequestUri())[0];
            $url = $request->getRequestUri();
            foreach(session("permisos") as $permiso_rol) {
                if(strpos($url, $permiso_rol["url"]) !== false){
                    if($request->isMethod($permiso_rol->metodo)) {
                        if($permiso_rol->identico == 1) {
                            if($permiso_rol->url == $url) {
                                return $next($request);
                            }
                        }else{
                            return $next($request);
                        }
                    }
                }
            }
            abort(403,"NO AUTORIZADO");
        }else{
            $request->session()->invalidate();
            abort(403, "NO TIENES PERMISOS");
        }
    }
}
