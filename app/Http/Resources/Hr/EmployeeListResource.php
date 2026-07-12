<?php

declare(strict_types=1);

namespace App\Http\Resources\Hr;

use App\Actions\GetProfileImageAction;
use App\Domain\Employee\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;
use Illuminate\Support\Facades\Date;

/**
 * @mixin Employee
 */
final class EmployeeListResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @return array<string, mixed>
     */
    public function toAttributes(Request $request): array
    {
        /** @var Employee $employee */
        $employee = $this->resource;
        $image = resolve(GetProfileImageAction::class)->handle($employee);

        return [
            'id' => $this->id,
            'name_en' => $this->full_name_en,
            'name_ar' => $this->full_name_ar,
            'email' => $this->user?->email,
            'extentions' => $this->loadMissing('extentions')->extentions->pluck('extention'),
            'employee_code' => $this->employee_code,
            'phone' => $this->phone,
            'joining_date' => Date::parse($this->joining_date)->format('Y-m-d'),
            'leaving_date' => $this->leaving_date ? Date::parse($this->leaving_date)->format('Y-m-d') : null,
            'image' => asset($image),
            'is_active' => $this->is_active,

            'department' => $this->loadMissing('department')->department?->getAttribute('name'),
            'national_id' => $this->loadMissing('nationalId')->nationalId?->getAttribute('identity_number'),
        ];
    }
}
