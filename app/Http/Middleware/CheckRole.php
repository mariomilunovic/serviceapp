<?php

namespace App\Http\Middleware;


use Closure;
use App\User;

class CheckRole
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
       
        if($request->user() === null)
        {
         return redirect()->back()->with('error','Zabranjen pristup');
            // return response('Zabranjen pristup',401);
        };

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles']:null;
        
        if($request->user()->hasAnyRoles($roles) || !$roles)
        {
            return $next($request);
        }

        //abort(401,'Nemate dozvolu za pristup'); može i ova varijanta
       return redirect()->back()->with('error','Zabranjen pristup');
        //  return response('Zabranjen pristup',401);    }
}
}
