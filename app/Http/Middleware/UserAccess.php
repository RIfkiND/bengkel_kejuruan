<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $userType): Response
    // {
    //     if(auth()->user()->role == $userType){
    //         return $next($request);
    //     }

    //     return response()->json(['You do not have permission to access for this page.']);
    // }

    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $user = auth()->user();

        if (in_array($user->role, $allowedRoles)) {
            return $next($request);
        }

        abort(403, 'You do not have permission to access this page.');
    }
}
