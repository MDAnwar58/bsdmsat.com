<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->header('email');
        $user = User::where('email', $email)->first();
        if ($user) {
            if ($user->status == 'permission') {
                return $next($request);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }else{
            return redirect()->route('login.page');
        }
    }
}