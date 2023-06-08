<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class NeedUserInitialization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route()->getName() === 'livewire.message') {
            $name = $request->route()->parameter('name');
            $allowed = ['wizard.developer-wizard', 'codewars', 'experience'];
            if (in_array($name, $allowed)) {
                return $next($request);
            }
        }
        $user = Auth::user();
        if ($user && !$user->initiated && !$request->routeIs('dashboard')) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
