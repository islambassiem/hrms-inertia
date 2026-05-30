<?php

declare(strict_types=1);

namespace App\Domain\Research\Data;

use App\Domain\Shared\Enums\ReferenceType;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\Constraints\WhereConstraint;

final class CreateResearchData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int $employee_id,

        #[Exists(
            'shared_reference_values',
            'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_STATUS)
        )]
        public int $status_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_TYPE)
        ), Nullable]
        public ?int $type_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_NATURE)
        ), Nullable]
        public ?int $nature_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_DOMAIN)
        )]
        public int $domain_id,

        #[Max(255), Min(5)]
        public string $title,

        public CarbonImmutable $publishing_date,

        #[Max(255), Min(5), Nullable]
        public ?string $publisher,

        #[Max(20), Min(10), Nullable]
        public ?string $isbn,

        #[Max(255), Min(5), Nullable]
        public ?string $magazine,

        #[Max(100), Min(1), Nullable]
        public ?int $edition,

        #[Max(1000), Min(10), Nullable]
        public ?int $page_count,

        #[Max(255), Min(5), Nullable]
        public ?string $publication_location,

        #[Max(1000), Min(5), Nullable]
        public ?string $summary,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_LANGUAGE)
        ), Nullable]
        public ?int $language_id,

        #[Max(255), Min(2), Nullable]
        public ?string $publishing_url,

        #[Max(255), Min(2), Nullable]
        public ?string $keywords,
    ) {
        //
    }
}
