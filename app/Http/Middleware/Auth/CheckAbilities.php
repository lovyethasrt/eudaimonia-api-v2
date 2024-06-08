<?php

namespace App\Http\Middleware\Auth;

use Illuminate\Auth\AuthenticationException;
use Laravel\Sanctum\Exceptions\MissingAbilityException;

class CheckAbilities
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$abilities
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\AuthenticationException|\Laravel\Sanctum\Exceptions\MissingAbilityException
     */
    public function handle($request, $next, ...$abilities)
    {
        if (!$request->user() || !$request->user()->currentAccessToken()) {
            throw new AuthenticationException();
        }

        /** @var \App\Models\Users\User */
        $user = $request->user();
        foreach ($abilities as $ability) {
            if (!$user->tokenCan($ability)) {
                return response()->forbidden('Not enoguh privileges.');
            }
        }

        return $next($request);
    }
}
