<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (session()->has('id') && session()->has('role_id')) {
        //     return $next($request);
        // } else {
        //     return redirect()->route('dashboard-log')->with('message', 'You must be logged in to access this page.');
        // }

        if (session()->has('id') && session()->has('role_id')) {

        $user = \App\Models\User::find(session('id'));

        if ($user && $user->status === 'active' && $user->user_status == 1) {
            return $next($request);
        }

        session()->flush();
        return redirect()->route('dashboard-log')
            ->with('message', 'Your account is not active. Please contact admin.');
    }
    return redirect()->route('dashboard-log')
        ->with('message', 'You must be logged in to access this page.');
    }
}
