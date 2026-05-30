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
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\Constraints\WhereConstraint;

final class UpdateResearchData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists(
            'shared_reference_values',
            'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_STATUS)
        ), Nullable]
        public int|Optional $status_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_TYPE)
        ), Nullable]
        public int|Optional $type_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_NATURE)
        ), Nullable]
        public int|Optional $nature_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_DOMAIN)
        ), Nullable]
        public int|Optional $domain_id,

        #[Max(255), Min(5)]
        public string|Optional $title,

        public CarbonImmutable|Optional $publishing_date,

        #[Max(255), Min(5), Nullable]
        public string|Optional $publisher,

        #[Max(20), Min(10), Nullable]
        public string|Optional $isbn,

        #[Max(255), Min(5), Nullable]
        public string|Optional $magazine,

        #[Max(100), Min(1), Nullable]
        public int|Optional $edition,

        #[Max(1000), Min(10), Nullable]
        public int|Optional $page_count,

        #[Max(255), Min(2), Nullable]
        public string|Optional $publication_location,

        #[Max(1000), Min(5), Nullable]
        public string|Optional $summary,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::RESEARCH_LANGUAGE)
        ), Nullable]
        public int|Optional $language_id,

        #[Max(255), Min(2), Nullable]
        public string|Optional $publishing_url,

        #[Max(255), Min(2), Nullable]
        public string|Optional $keywords,
    ) {
        //
    }
}
