<?php

namespace App\Http\Middleware;

use Closure;

class Installer
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
        //verificar si la instalación de la app ya se realizó
        if(!file_exists(storage_path('installed'))) {
            
            //verificar que url invocado no sea el installer            
            if(!$request->is('installer*')){
                
                return redirect('installer');
            }
        }    
        return $next($request);
    }
}
