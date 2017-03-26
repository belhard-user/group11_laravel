<?php

namespace App\Http\Middleware;

use Closure;

class SecurityMiddleware
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
        $user = $request->user();

        $availRoles = [
            \App\User::ROLE_ADMIN,
            \App\User::ROLE_MANAGER,
        ];



        if(! $user || ! in_array($user->role, $availRoles)){
            abort(403);
        }
        
        return $next($request);
    }
}
