<?php

declare(strict_types=1);

namespace App\Http\Resources\Hr;

use App\Domain\Employee\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Employee
 */
final class EmployeeProfileResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'employee_code' => $this->employee_code,
            'full_name_en' => $this->full_name_en,
            'full_name_ar' => $this->full_name_ar,
            'full_name' => $this->full_name,
            'image' => $this->image,
            'is_active' => $this->is_active,
            'joining_date' => $this->joining_date,
            'date_of_birth' => $this->date_of_birth,
            'department' => $this->department?->getTranslation('name', app()->getLocale()),
            'category' => $this->category?->getTranslation('name', app()->getLocale()),
            'head' => $this->head?->full_name_en,
            'position' => $this->position,
            // 'jobTitle' => $this->position?->getTranslation('name', app()->getLocale()),
        ];
    }
}
