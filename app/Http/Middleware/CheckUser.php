<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        //Check user login session
        if (!$request->session()->has('user')) {
            return redirect('auth/login');
        }

        //check user role to allow route
//        $role = session()->get('Role')['code'];
//        if (!in_array($role, $allowedRoles)) {
//            return redirect('home');
//        }

        return $next($request);
    }
}
