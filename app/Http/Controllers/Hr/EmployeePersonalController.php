<?php

declare(strict_types=1);

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class EmployeePersonalController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('hr/employees/show/Personal');
    }
}
