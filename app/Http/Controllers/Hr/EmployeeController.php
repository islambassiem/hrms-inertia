<?php

declare(strict_types=1);

namespace App\Http\Controllers\Hr;

use App\Data\EmploeeFilterData;
use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Shared\Queries\CountriesListQuery;
use App\Domain\Shared\Queries\MaritalStatusListQuery;
use App\Domain\Shared\Queries\ReligionListQuery;
use App\Domain\Shared\Queries\SpecialNeedsListQuery;
use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\EmployeeListResource;
use App\Http\Resources\ListResource;
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
        $data = EmploeeFilterData::from($request->collect()->toArray());
        $employeesQuery = resolve(EmployeeListQuery::class)->build($data);

        $employees = $employeesQuery->paginate()->withQueryString()->onEachSide(1);
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
            'departments' => ListResource::collection($departments),
            'colleges' => ListResource::collection($colleges),
            'entities' => ListResource::collection($entities),
            'categories' => ListResource::collection($categories),
            'academicRanks' => ListResource::collection($academicRanks),
            'sponsorships' => ListResource::collection($sponsorships),
            'positions' => ListResource::collection($positions),
            'nationalities' => ListResource::collection($nationalities),
            'genders' => ListResource::collection($genders),
            'filters' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $departments = resolve(DepartmentListQuery::class)->build(DepartmentType::DEPARTMENT)->get();
        $categories = resolve(CategoryListQuery::class)->build()->get();
        $countries = resolve(CountriesListQuery::class)->build()->get();
        $genders = resolve(GenderListQuery::class)->build()->get();
        $religions = resolve(ReligionListQuery::class)->build()->get();
        $maritalStatuses = resolve(MaritalStatusListQuery::class)->build()->get();
        $specialNeeds = resolve(SpecialNeedsListQuery::class)->build()->get();

        return Inertia::render('hr/employees/create', [
            'departments' => ListResource::collection($departments),
            'categories' => ListResource::collection($categories),
            'countries' => ListResource::collection($countries),
            'genders' => ListResource::collection($genders),
            'religions' => ListResource::collection($religions),
            'maritalStatuses' => ListResource::collection($maritalStatuses),
            'specialNeeds' => ListResource::collection($specialNeeds),
        ]);
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
