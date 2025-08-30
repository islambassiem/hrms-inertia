<?php

namespace App\Http\Controllers\Hr;

use App\Dtos\EmployeeFilterDTO;
use App\Enums\Gender;
use App\Enums\JobStatus;
use App\Enums\Qualification;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CountryListResource;
use App\Http\Resources\DepartmentListResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\GenderListResource;
use App\Http\Resources\JobStatusListResource;
use App\Http\Resources\QualificationListResource;
use App\Http\Resources\SponsorshipListResource;
use App\Models\Category;
use App\Models\Country;
use App\Models\Department;
use App\Models\Sponsorship;
use App\Queries\Hr\EmployeeListQuery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(EmployeeListQuery $query, Request $request): \Inertia\Response
    {
        $employees = $query->handle(
            new EmployeeFilterDTO(
                $request->input('gender', []),
                $request->input('status', []),
                $request->input('identificaiton'),
                $request->input('passport'),
                $request->input('departments', []),
                $request->input('categories', []),
                $request->input('countries', []),
                $request->input('sponsorships', []),
                $request->input('qualifications', []),
                $request->input('from'),
                $request->input('to'),
            )
        );

        return Inertia::render('HR/Employees', [
            'status' => JobStatusListResource::collection(JobStatus::cases()),
            'genders' => GenderListResource::collection(Gender::cases()),
            'employees' => EmployeeResource::collection($employees),
            'departments' => DepartmentListResource::collection(Department::all()),
            'categories' => CategoryListResource::collection(Category::all()),
            'countries' => CountryListResource::collection(Country::all()),
            'sponsorships' => SponsorshipListResource::collection(Sponsorship::all()),
            'qualifications' => QualificationListResource::collection(Qualification::cases()),
        ]);
    }
}
