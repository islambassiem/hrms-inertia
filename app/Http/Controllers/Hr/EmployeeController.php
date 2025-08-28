<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(): \Inertia\Response
    {
        $employees = Employee::with([
            'user', 'nationality', 'sponsorship', 'categories', 'positions', 'departments',
        ])->get();

        return Inertia::render('Hr/Employees', [
            'employees' => EmployeeResource::collection($employees),
        ]);
    }
}
