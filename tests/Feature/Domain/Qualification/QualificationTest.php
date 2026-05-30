<?php

declare(strict_types=1);

use App\Domain\Qualification\Actions\CreateQualificationAction;
use App\Domain\Qualification\Actions\UpdateQualificationAction;
use App\Domain\Qualification\Data\CreateQualificationData;
use App\Domain\Qualification\Data\UpdateQualificationData;
use App\Domain\Qualification\Models\Qualification;

use function Pest\Laravel\assertDatabaseHas;

it('creates a qualification', function (): void {
    $payload = Qualification::factory()->raw();

    $created = resolve(CreateQualificationAction::class)->handle(
        CreateQualificationData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Qualification::class);
    expect($created->exists)->toBeTrue();

    assertDatabaseHas('qualification_qualifications', [
        'employee_id' => $payload['employee_id'],
        'major_id' => $payload['major_id'],
        'minor_id' => $payload['minor_id'],
        'educational_sub_level_id' => $payload['educational_sub_level_id'],
        'included_specialty_id' => $payload['included_specialty_id'],
        'institution_name' => $payload['institution_name'],
        'college_name' => $payload['college_name'],
        'scientific_degree_id' => $payload['scientific_degree_id'],
        'graduation_country_id' => $payload['graduation_country_id'],
        'is_last_qualification' => $payload['is_last_qualification'],
        'rating_id' => $payload['rating_id'],
        'gpa' => $payload['gpa'],
        'gpa_type_id' => $payload['gpa_type_id'],
        'study_type_id' => $payload['study_type_id'],
        'city' => $payload['city'],
        'research_type_id' => $payload['research_type_id'],
        'is_authenticated' => $payload['is_authenticated'],
    ]);
    expect($created->graduation_date->toDateString())->toBe($payload['graduation_date']);
});

it('updates a qualification', function (): void {
    $payload = Qualification::factory()->raw();

    $updated = resolve(UpdateQualificationAction::class)->handle(
        UpdateQualificationData::validateAndCreate($payload),
        Qualification::factory()->create(),
    );

    expect($updated)->toBeInstanceOf(Qualification::class);
    expect($updated->exists)->toBeTrue();

    assertDatabaseHas('qualification_qualifications', [
        'employee_id' => $payload['employee_id'],
        'major_id' => $payload['major_id'],
        'minor_id' => $payload['minor_id'],
        'educational_sub_level_id' => $payload['educational_sub_level_id'],
        'included_specialty_id' => $payload['included_specialty_id'],
        'institution_name' => $payload['institution_name'],
        'college_name' => $payload['college_name'],
        'scientific_degree_id' => $payload['scientific_degree_id'],
        'graduation_country_id' => $payload['graduation_country_id'],
        'is_last_qualification' => $payload['is_last_qualification'],
        'rating_id' => $payload['rating_id'],
        'gpa' => $payload['gpa'],
        'gpa_type_id' => $payload['gpa_type_id'],
        'study_type_id' => $payload['study_type_id'],
        'city' => $payload['city'],
        'research_type_id' => $payload['research_type_id'],
        'is_authenticated' => $payload['is_authenticated'],
    ]);
    expect($updated->graduation_date->toDateString())->toBe($payload['graduation_date']);
});

it('fails to create a qualification if :dataset', function (array $overrides, array $fields): void {
    $payload = Qualification::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateQualificationAction::class)->handle(
        CreateQualificationData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update a qualification if :dataset', function (array $overrides, array $fields): void {
    $payload = Qualification::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateQualificationAction::class)->handle(
        UpdateQualificationData::validateAndCreate($payload),
        Qualification::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [

    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('major_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('minor_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('educational_sub_level_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('included_specialty_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('institution_name')
        ->tooShort(4)
        ->tooLong(50)
        ->build(),

    ...invalid('college_name')
        ->tooShort(4)
        ->tooLong(50)
        ->build(),

    ...invalid('scientific_degree_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('graduation_date')
        ->required()
        ->build(),

    ...invalid('graduation_country_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('rating_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('gpa_type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('study_type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('city')
        ->tooShort(4)
        ->tooLong(50)
        ->build(),

    ...invalid('research_type_id')
        ->invalidForeignKey()
        ->build(),
]);

dataset('update', [

    ...invalid('employee_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('major_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('minor_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('educational_sub_level_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('included_specialty_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('institution_name')
        ->tooShort(4)
        ->tooLong(50)
        ->build(),

    ...invalid('college_name')
        ->tooShort(4)
        ->tooLong(50)
        ->build(),

    ...invalid('scientific_degree_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('graduation_date')
        ->build(),

    ...invalid('graduation_country_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('rating_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('gpa_type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('study_type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('city')
        ->tooShort(4)
        ->tooLong(50)
        ->build(),

    ...invalid('research_type_id')
        ->invalidForeignKey()
        ->build(),
]);
