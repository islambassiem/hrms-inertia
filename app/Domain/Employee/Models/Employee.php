<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Domain\Address\Models\Address;
use App\Domain\Identity\Enums\IdentityEnum;
use App\Domain\Identity\Models\Identity;
use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Organization\Models\Department;
use App\Domain\Shared\Models\Country;
use App\Domain\Shared\Models\Gender;
use App\Domain\Shared\Models\MaritalStatus;
use App\Domain\Shared\Models\Religion;
use App\Domain\Shared\Models\SpecialNeeds;
use App\Models\User;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'user_id',
    'head_id',
    'employee_code',
    'first_name_ar',
    'middle_name_ar',
    'third_name_ar',
    'last_name_ar',
    'first_name_en',
    'middle_name_en',
    'third_name_en',
    'last_name_en',
    'marital_status_id',
    'religion_id',
    'special_needs_id',
    'gender_id',
    'category_id',
    'department_id',
    'nationality_id',
    'place_of_birth',
    'email',
    'phone',
    'image',
    'date_of_birth',
    'joining_date',
    'leaving_date',
    'home_telephone_number',
    'home_country_identity',
    'blood_type',
    'is_active',
    'created_by',
    'updated_by',
])]
/**
 * @property int $id
 * @property int $head_id
 * @property Employee $head
 * @property string $full_name
 * @property string $full_name_en
 * @property string $full_name_ar
 * @property Identity|null $nationalId
 * @property string[] $extentions
 * @property Identity|null $passport
 * @property Salary $currentSalary
 * @property EmployeeOrganizationAttribute $position
 * @property EmployeeOrganizationAttribute $jobTitle
 * @property-read Department|null $department
 * @property \Carbon\CarbonImmutable|null $date_of_birth
 * @property \Carbon\CarbonImmutable|null $joining_date
 * @property \Carbon\CarbonImmutable|null $leaving_date
 */
#[Table('employees')]
final class Employee extends Model
{
    /** @use HasFactory<EmployeeFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Employee, $this>
     */
    public function head(): BelongsTo
    {
        return $this->belongsTo(self::class, 'head_id');
    }

    /**
     * @return BelongsTo<MaritalStatus, $this>
     */
    public function maritalStatus(): BelongsTo
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    /**
     * @return BelongsTo<Religion, $this>
     */
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    /**
     * @return BelongsTo<SpecialNeeds, $this>
     */
    public function specialNeeds(): BelongsTo
    {
        return $this->belongsTo(SpecialNeeds::class);
    }

    /**
     * @return BelongsTo<Gender, $this>
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * @return BelongsTo<Department, $this>
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany<EmployeeOrganizationAttribute, $this>
     */
    public function organizationAttribute(): HasMany
    {
        return $this->hasMany(EmployeeOrganizationAttribute::class);
    }

    /**
     * @return BelongsTo<Country, $this>
     */
    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }

    /**
     * @return HasOne<Identity, $this>
     */
    public function nationalId(): HasOne
    {
        return $this->hasOne(Identity::class)
            ->where('identity_type_id', IdentityEnum::NATIONAL_IDENTITY->value);
    }

    /**
     * @return HasOne<Identity, $this>
     */
    public function passport(): HasOne
    {
        return $this->hasOne(Identity::class)
            ->where('identity_type_id', IdentityEnum::PASSPORT->value);
    }

    /**
     * @return HasOne<Address, $this>
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function casts(): array
    {
        return [
            'date_of_birth' => 'immutable_date',
            'joining_date' => 'immutable_date',
            'leaving_date' => 'immutable_date',
            'is_active' => 'boolean',
        ];
    }

    /**
     * @return HasMany<EmployeeExtention, $this>
     */
    public function extentions(): HasMany
    {
        return $this->hasMany(EmployeeExtention::class);
    }

    /**
     * @return HasMany<Salary, $this>
     */
    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class);
    }

    /**
     * @return HasOne<Salary, $this>
     */
    public function currentSalary(): HasOne
    {
        return $this->hasOne(Salary::class)
            ->whereNull('effective_to');
    }

    /**
     * @return HasMany<Allowance, $this>
     */
    public function allowances(): HasMany
    {
        return $this->hasMany(Allowance::class);
    }

    /**
     * @return HasMany<Allowance, $this>
     */
    public function currentAllowances(): HasMany
    {
        return $this->hasMany(Allowance::class)
            ->whereNull('effective_to');
    }

    public function currentAllowanceAmount(AllowanceType $type): ?Allowance
    {
        return $this->currentAllowances()
            ->where('allowance_type_id', $type->id)
            ->first();
    }

    /**
     * @return HasOne<EmployeeOrganizationAttribute, $this>
     */
    public function position(): HasOne
    {
        return $this->hasOne(EmployeeOrganizationAttribute::class)
            ->where('attribute_id', AttributeType::POSITION);
    }

    /**
     * @return HasOne<EmployeeOrganizationAttribute, $this>
     */
    public function jobTitle(): HasOne
    {
        return $this->hasOne(EmployeeOrganizationAttribute::class)
            ->whereNull('end_date')
            ->where('type_id', AttributeType::JOB_TITLE);
    }

    protected static function newFactory(): EmployeeFactory
    {
        return EmployeeFactory::new();
    }

    /**
     * @return Attribute<string, never>
     */
    protected function fullNameEn(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => collect([
                $attributes['first_name_en'] ?? null,
                $attributes['middle_name_en'] ?? null,
                $attributes['third_name_en'] ?? null,
                $attributes['last_name_en'] ?? null,
            ])->filter()->implode(' ')
        );
    }

    /**
     * @return Attribute<string, string>
     */
    protected function fullNameAr(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => collect([
                $attributes['first_name_ar'] ?? null,
                $attributes['middle_name_ar'] ?? null,
                $attributes['third_name_ar'] ?? null,
                $attributes['last_name_ar'] ?? null,
            ])->filter()->implode(' ')
        );
    }

    /**
     * @return Attribute<string, string>
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $locale = app()->isLocale('ar');

                return collect([
                    $locale ? $attributes['first_name_ar'] ?? null : $attributes['first_name_en'] ?? null,
                    $locale ? $attributes['middle_name_ar'] ?? null : $attributes['middle_name_en'] ?? null,
                    $locale ? $attributes['third_name_ar'] ?? null : $attributes['third_name_en'] ?? null,
                    $locale ? $attributes['last_name_ar'] ?? null : $attributes['last_name_en'] ?? null,
                ])->filter()->implode(' ');
            }
        );
    }
}
