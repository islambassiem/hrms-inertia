<?php

declare(strict_types=1);

namespace App\Http\Controllers\Hr;

use App\Domain\Employee\Models\Employee;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // [
        //     'position' => 'Software Engineer',
        //     'department' => 'IT',
        //     'email' => '7dNlG@example.com',
        //     'phone' => '123-456-7890',
        //     'extentions' => ['105', '115'],
        //     'is_active' => true,
        //     'joining_date' => '2023-01-15',
        //     'leaving_date' => null,
        //     'image' => "https://csmonline.net/storage/profile/500322.jpeg",
        // ];

        /** @var Collection<int, Employee> $employees */
        $employees = Employee::query()
            ->with([
                'department:id,name',
                'user:id,email',
                'nationalId:id,employee_id,identity_type_id,identity_number',
            ])
            ->select([
                'id',
                'first_name_en',
                'middle_name_en',
                'third_name_en',
                'last_name_en',
                'full_name_en',
                'first_name_ar',
                'middle_name_ar',
                'third_name_ar',
                'last_name_ar',
                'full_name_ar',
                'employee_code',
                'department_id',
                'user_id',
                'phone',
                'joining_date',
                'leaving_date',
                'image',
                'is_active',
            ])
            ->limit(10)
            ->get();

        $employees = $employees->map(fn ($employee) => [
            'id' => $employee->id,
            'full_name_en' => $employee->full_name_en,
            'full_name_ar' => $employee->full_name_ar,
            'employee_code' => $employee->employee_code,
            'department' => $employee->department?->name,
            'email' => $employee->user?->email,
            'phone' => "0{$employee->phone}",
            'joining_date' => Carbon::parse($employee->joining_date)->format('Y-m-d'),
            'leaving_date' => Carbon::parse($employee->leaving_date)->format('Y-m-d'),
            'image' => $employee->image,
            'national_id' => $employee->nationalId?->id_number,
            'is_active' => $employee->is_active,
        ]);

        return Inertia::render('hr/employees/index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        //
    }
}
