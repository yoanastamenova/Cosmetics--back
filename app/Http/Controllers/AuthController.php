<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    // Validate input data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 401);
    }

    // Create user record in the database
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Return success response
    return response()->json(['message' => 'User registered successfully'], 201);
}

    public function login(Request $request)
    {
     $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('AppName')->accessToken;
            $success['name'] = $user->name;
            
            return response()->json(['success' => $success], 200);
        } else {
            // Log failed login attempt
            \Log::warning('Failed login attempt for user with email: ' . $request->email);
    
            return response()->json(['error' => 'Unauthorized - Check credentials and try again'], 401);
        }
    }
}