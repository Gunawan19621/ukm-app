<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // yang diubah
    public function handle(Request $request, Closure $next, String $role)
    {
        // yang diubah
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        if (strtoupper($user->role) == strtoupper($role)) {
            return $next($request);
        }
        return redirect('/');
    }
}
