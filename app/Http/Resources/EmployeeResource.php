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

        return [
            'id' => $this->id,
            'empid' => $this->code,
            'image' => $this->profileImage(),
            'name_ar' => $this->resource->arabic_name,
            'name_en' => $this->resource->english_name,
            'email' => $this->whenLoaded('user', $this->user->email),
            'gender' => $gender->label(),
            'date_of_birth' => Carbon::parse($this->date_of_birth)->format('Y-m-d'),
            'identification' => $this->whenLoaded('nationalId', $this->nationalId?->id_number),
            'passprt' => $this->whenLoaded('passport', $this->passport?->id_number),
            'is_active' => $this->is_active,
            'has_salary' => $this->has_salary,
            'has_biometric' => $this->has_biometric,
            'works_on_saturday' => $this->works_on_saturday,
            'joining_date' => $this->joining_date,
            'resignation_date' => $this->resignation_date,
            'has_married_contract' => $this->has_married_contract,
            'vacation_class' => $this->vacation_class,
            'special_needs' => $this->special_needs,
            'nationality' => $this->whenLoaded('nationality', app()->getLocale() === 'ar' ? $this->nationality->country_ar : $this->nationality->country_en),
            'sponsorship' => $this->whenLoaded('sponsorship', app()->getLocale() === 'ar' ? $this->sponsorship->sponsorship_ar : $this->sponsorship->sponsorship_en),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'positions' => PositionResource::collection($this->whenLoaded('positions')),
            'departments' => DepartmentResource::collection($this->whenLoaded('departments')),
        ];
    }
}
