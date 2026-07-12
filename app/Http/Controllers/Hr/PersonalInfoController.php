<?php

namespace App\Http\Controllers\Hr;

use App\Domain\Employee\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\EmployeeProfileResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PersonalInfoController extends Controller
{
    public function show(Employee $employee): Response
    {
        return Inertia::render('hr/employees/show/personal', [
            'employee' => EmployeeProfileResource::make($employee)
        ]);
    }
}
