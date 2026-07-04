<?php

declare(strict_types=1);

namespace App\Http\Controllers\Hr;

use App\Domain\Organization\Enums\DepartmentType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\DepartmentListResource;
use App\Http\Resources\Hr\EmployeeListResource;
use App\Queries\Hr\DepartmentListQuery;
use App\Queries\Hr\EmployeeListQuery;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $employees = (new EmployeeListQuery())($request->string('search')->value());
        $departments = (new DepartmentListQuery())(DepartmentType::DEPARTMENT);
        $colleges = (new DepartmentListQuery())(DepartmentType::COLLEGE);
        $entities = (new DepartmentListQuery())(DepartmentType::ENTITY);

        return Inertia::render('hr/employees/index', [
            'employees' => EmployeeListResource::collection($employees),
            'departments' => DepartmentListResource::collection($departments),
            'colleges' => DepartmentListResource::collection($colleges),
            'entities' => DepartmentListResource::collection($entities),
            'filters' => $request->only(['search']),
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
