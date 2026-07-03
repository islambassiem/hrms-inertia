<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('hr/home');
    }
}
