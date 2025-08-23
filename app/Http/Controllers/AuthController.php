<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login(): \Inertia\Response
    {
        return inertia('Auth/Login');
    }
}
