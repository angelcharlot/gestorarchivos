<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\archivo;
use Illuminate\Support\Facades\Auth;
class permisorutaarchivo
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
       

        $archivo=archivo::find($request->id);
      

        if (Auth::user()->can($archivo->p_see)) {
            return $next($request);
         }
         return abort(403);

      
    }
}
