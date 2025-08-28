<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Employee
 */
class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Enums\Gender $gender */
        $gender = $this->gender;

        /** @var \App\Enums\MaritalStatus $status */
        $status = $this->marital_status;

        /** @var \App\Enums\Religion $religion */
        $religion = $this->religion;

        return [
            'id' => $this->id,
            'empid' => $this->code,
            'name_ar' => $this->resource->arabic_name,
            'name_en' => $this->resource->english_name,
            'email' => UserResource::make($this->whenLoaded('user')),
            'gender' => $gender->label(),
            'marital_status' => $status?->label(),
            'religion' => $religion?->label(),
            'date_of_birth' => Carbon::parse($this->date_of_birth)->format('Y-m-d'),
            'is_active' => $this->is_active,
            'has_salary' => $this->has_salary,
            'has_biometric' => $this->has_biometric,
            'works_on_saturday' => $this->works_on_saturday,
            'joining_date' => $this->joining_date,
            'resignation_date' => $this->resignation_date,
            'has_married_contract' => $this->has_married_contract,
            'vacation_class' => $this->vacation_class,
            'special_needs' => $this->special_needs,
            'nationality' => CountryResource::make($this->whenLoaded('nationality')),
            'sponsorship' => SponsorshipResource::make($this->whenLoaded('sponsorship')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'positions' => PositionResource::collection($this->whenLoaded('positions')),
            'departments' => DepartmentResource::collection($this->whenLoaded('departments')),
        ];
    }
}
