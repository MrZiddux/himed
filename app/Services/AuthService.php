<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct()
    {
        //
    }

    public function loginHandler($payload)
    {
        $credentials = [
            'email' => $payload->email, 
            'password' => $payload->password
        ];
        
        if (Auth::attempt($credentials)) {
            return Auth::check();
        } else {
            return Auth::check();
        }

    }
}
