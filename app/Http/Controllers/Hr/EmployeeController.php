<?php

namespace App\Http\Controllers\Hr;

use App\Dtos\EmployeeFilterDTO;
use App\Enums\Gender;
use App\Enums\JobStatus;
use App\Enums\Qualification;
use App\Exports\EmployeesExport;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EmployeeController extends Controller
{
    public function index(EmployeeListQuery $query, Request $request): \Inertia\Response
    {
        $employees = $this->filter($query, $request)->get();

        return Inertia::render('Hr/Employees', [
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

    public function export(Request $request, EmployeeListQuery $query): BinaryFileResponse
    {
        // dd($request->all());
        $employees = $this->filter($query, $request);


        return (new EmployeesExport($employees->get()))->download('employees.xlsx');
    }

    /**
     * @return Builder<Employee>
     */
    private function filter(EmployeeListQuery $query, Request $request): Builder
    {
        $builder = $query->handle(
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
                $request->input('active_from'),
                $request->input('active_to'),
                $request->input('joining_date_from'),
                $request->input('joining_date_to'),
                $request->input('resignation_date_from'),
                $request->input('resignation_date_to'),
            )
        );
        return $builder;
    }
}
