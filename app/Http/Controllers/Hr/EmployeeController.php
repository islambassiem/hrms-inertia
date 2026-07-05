<?php

declare(strict_types=1);

namespace App\Http\Controllers\Hr;

use App\Domain\Organization\Enums\DepartmentType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\CategoryListResource;
use App\Http\Resources\Hr\DepartmentListResource;
use App\Http\Resources\Hr\EmployeeListResource;
use App\Queries\Hr\CategoryListQuery;
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
        $employees = app(EmployeeListQuery::class)->build($request->string('search')->value())
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);
        $employeesCount = app(EmployeeListQuery::class)->build($request->string('search')->value())->count();
        $departments = app(DepartmentListQuery::class)->build(DepartmentType::DEPARTMENT)->get();
        $colleges = app(DepartmentListQuery::class)->build(DepartmentType::COLLEGE)->get();
        $entities = app(DepartmentListQuery::class)->build(DepartmentType::ENTITY)->get();
        $categories = app(CategoryListQuery::class)->build()->get();

        return Inertia::render('hr/employees/index', [
            'employees' => EmployeeListResource::collection($employees),
            'employeesCount' => $employeesCount,
            'departments' => DepartmentListResource::collection($departments),
            'colleges' => DepartmentListResource::collection($colleges),
            'entities' => DepartmentListResource::collection($entities),
            'categories' => CategoryListResource::collection($categories),
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
