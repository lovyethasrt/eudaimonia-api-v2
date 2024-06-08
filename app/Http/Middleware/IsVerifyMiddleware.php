<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Kreait\Firebase\Auth;
use Lcobucci\JWT\Token\Plain;

class IsVerifyMiddleware
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
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $claims = $verifiedIdToken->claims();
        $user = User::where('email', '=', $claims->get('email'))->first();
        $request->attributes->set('user', $user);
        // $request->attributes->set('role', $user->role);
        return $next($request);
    }
}
