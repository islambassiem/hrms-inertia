<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Domain\Employee\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;

/**
 * @mixin Employee
 */
final class ContactResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @return array<string, mixed>
     */
    public function toAttributes(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee_code' => $this->employee_code,
            'name_en' => $this->full_name_en,
            'name_ar' => $this->full_name_ar,
            'phone' => $this->phone,
            'image' => asset($this->image ?? ''),
            'email' => $this->user?->email,
            'extentions' => $this->extentions->pluck('extention')->toArray(),
        ];
    }
}
