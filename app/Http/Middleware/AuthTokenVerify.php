<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthTokenVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $tokenVerify = JWTToken::verifyToken($token);
        if ($tokenVerify == "unauthorized") {
           return redirect()->route('login.page');
        }else{
            $request->headers->set('email', $tokenVerify->email);
            $request->headers->set('id', $tokenVerify->userId);
            return $next($request);
        }
    }
}
