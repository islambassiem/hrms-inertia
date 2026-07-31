<?php

declare(strict_types=1);

namespace App\Http\Resources\Hr;

use App\Actions\GetProfileImageAction;
use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeExtention;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
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
        /** @var Employee $employee */
        $employee = $this->resource;

        /** @var CarbonImmutable $dob */
        $dob = $employee->date_of_birth;

        /** @var Collection<int, EmployeeExtention> $extentions */
        $extentions = $employee->extentions;

        /** @var CarbonImmutable|null $nationIdIssueDate */
        $nationIdIssueDate = $this->nationalId?->getAttribute('issue_date');

        /** @var CarbonImmutable|null $nationIdExpiryDate */
        $nationIdExpiryDate = $this->nationalId?->getAttribute('expiry_date');

        /** @var CarbonImmutable|null $passportIssueDate */
        $passportIssueDate = $this->passport?->getAttribute('issue_date');

        /** @var CarbonImmutable|null $passportExpiryDate */
        $passportExpiryDate = $this->passport?->getAttribute('expiry_date');

        /** @var CarbonImmutable $doj */
        $doj = $employee->joining_date;
        $image = resolve(GetProfileImageAction::class)->handle($employee);

        return [
            'id' => $this->id,
            'employee_code' => $this->employee_code,
            'profile' => [
                'prefered_name' => $this->user?->getAttribute('name'),
                'full_name' => $this->full_name,
                'image' => asset($image),
            ],
            'contacts' => [
                'official_email' => $this->user?->getAttribute('email'),
                'personal_email' => $this->email,
                'phone' => $this->phone,
                'extentions' => $extentions->pluck('extention')->toArray(),
            ],
            'national_address' => [
                'short_address' => $this->address?->getAttribute('short_address') ?? '-',
                'street' => $this->address?->getAttribute('street') ?? '-',
                'city' => $this->address?->getAttribute('city') ?? '-',

            ],
            'personal' => [
                'gender' => $this->gender?->getAttribute('name'),
                'date_of_birth' => $dob->format('d/m/Y'),
                'nationality' => app()->getLocale() === 'en' ? $this->nationality?->getAttribute('name_en') : $this->nationality?->getAttribute('name_ar'),
                'marital_status' => $this->maritalStatus?->getAttribute('name'),
                'religion' => $this->religion?->getAttribute('name'),
            ],
            'official' => [
                'is_active' => $this->is_active,
                'joining_date' => $doj->format('d/m/Y'),
                'department' => $this->department?->getTranslation('name', app()->getLocale()),
                'category' => $this->category?->getTranslation('name', app()->getLocale()),
                'head' => $this->head?->full_name_en,
                'position' => $this->position,
                // 'jobTitle' => $this->position?->getTranslation('name', app()->getLocale()),
            ],
            'identification' => [
                'identity_number' => $this->nationalId?->getAttribute('identity_number'),
                'place_of_issue' => $this->nationalId?->getAttribute('place_of_issue'),
                'issue_date' => $nationIdIssueDate?->format('d/m/Y'),
                'expiry_date' => $nationIdExpiryDate?->format('d/m/Y'),
            ],
            'passport' => [
                'identity_number' => $this->passport?->getAttribute('identity_number'),
                'place_of_issue' => $this->passport?->getAttribute('place_of_issue'),
                'issue_date' => $passportIssueDate?->format('d/m/Y'),
                'expiry_date' => $passportExpiryDate?->format('d/m/Y'),
            ],
        ];
    }
}
