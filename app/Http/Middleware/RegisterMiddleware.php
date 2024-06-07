<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Kreait\Firebase\Auth;
use Lcobucci\JWT\Token\Plain;

class RegisterMiddleware
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $idToken = $request->bearerToken();

        if (!$idToken) {
            return response()->json(['message' => 'Invalid token.'], 401);
        }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $claims = $verifiedIdToken->claims();
        $request->attributes->set('email', $claims->get('email'));
        $request->attributes->set('id', $claims->get('user_id'));
        return $next($request);
    }
}
