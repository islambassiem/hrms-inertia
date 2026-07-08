<?php

declare(strict_types=1);

namespace App\Http\Controllers\Hr;

use App\Data\EmploeeFilterData;
use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Organization\Enums\DepartmentType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\CategoryListResource;
use App\Http\Resources\Hr\DepartmentListResource;
use App\Http\Resources\Hr\EmployeeListResource;
use App\Http\Resources\Hr\EmployeeNationalityListResource;
use App\Http\Resources\Hr\GenderListResource;
use App\Http\Resources\Hr\OrganizationAttributeListResource;
use App\Queries\Hr\CategoryListQuery;
use App\Queries\Hr\DepartmentListQuery;
use App\Queries\Hr\EmployeeListQuery;
use App\Queries\Hr\EmployeeNationalityListQuery;
use App\Queries\Hr\GenderListQuery;
use App\Queries\Hr\OrganizationAttributeListQuery;
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
        logger('request', $request->toArray());

        /** @var array<int>|null $entities */
        $entities = $request->array('entities');

        /** @var array<int>|null $colleges */
        $colleges = $request->array('colleges');

        /** @var array<int>|null $departments */
        $departments = $request->array('departments');

        /** @var array<int>|null $academicRanks */
        $academicRanks = $request->array('academicRanks');

        /** @var array<int>|null $positions */
        $positions = $request->array('positions');

        /** @var array<int>|null $genders */
        $genders = $request->array('genders');

        /** @var array<int>|null $categories */
        $categories = $request->array('categories');

        /** @var array<int>|null $sponsorships */
        $sponsorships = $request->array('sponsorships');

        /** @var array<int>|null $nationalities */
        $nationalities = $request->array('nationalities');

        /** @var array<int>|null $joiningDate */
        $joiningDate = $request->array('joining');

        $data = new EmploeeFilterData(
            search: $request->string('search')->value(),
            entities: $entities,
            colleges: $colleges,
            departments: $departments,
            academicRanks: $academicRanks,
            positions: $positions,
            genders: $genders,
            categories: $categories,
            sponsorships: $sponsorships,
            nationalities: $nationalities,
            joiningDate: $joiningDate
        );

        $employeesQuery = resolve(EmployeeListQuery::class)->build($data);

        $employees = $employeesQuery
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);
        $employeesCount = $employeesQuery->count();
        $departments = resolve(DepartmentListQuery::class)->build(DepartmentType::DEPARTMENT)->get();
        $colleges = resolve(DepartmentListQuery::class)->build(DepartmentType::COLLEGE)->get();
        $entities = resolve(DepartmentListQuery::class)->build(DepartmentType::ENTITY)->get();
        $categories = resolve(CategoryListQuery::class)->build()->get();
        $academicRanks = resolve(OrganizationAttributeListQuery::class)->build(AttributeType::ACADEMIC_RANK)->get();
        $sponsorships = resolve(OrganizationAttributeListQuery::class)->build(AttributeType::SPONSORSHIP)->get();
        $positions = resolve(OrganizationAttributeListQuery::class)->build(AttributeType::POSITION)->get();
        $nationalities = resolve(EmployeeNationalityListQuery::class)->build()->get();
        $genders = resolve(GenderListQuery::class)->build()->get();

        return Inertia::render('hr/employees/index', [
            'employees' => EmployeeListResource::collection($employees),
            'employeesCount' => $employeesCount,
            'departments' => DepartmentListResource::collection($departments),
            'colleges' => DepartmentListResource::collection($colleges),
            'entities' => DepartmentListResource::collection($entities),
            'categories' => CategoryListResource::collection($categories),
            'academicRanks' => OrganizationAttributeListResource::collection($academicRanks),
            'sponsorships' => OrganizationAttributeListResource::collection($sponsorships),
            'positions' => OrganizationAttributeListResource::collection($positions),
            'nationalities' => EmployeeNationalityListResource::collection($nationalities),
            'genders' => GenderListResource::collection($genders),
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
