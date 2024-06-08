<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(Request $request)
    {
        if(!$request->attributes->get('id') && !$request->attributes->get('email')){
            return response()->badRequest();
        }
        User::create([
            'id' => $request->attributes->get('id'),
            'name' => Str::random(8),
            'email' => $request->attributes->get('email'),
        ]);

        return response()->success();
    }

    public function login(Request $request)
    {
        $user =  $request->attributes->get('user');
        $token = $user->createToken($user->email, $user->role->abilities())->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }

    
}
