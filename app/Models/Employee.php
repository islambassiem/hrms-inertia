<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends BaseModel
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name_en',
        'middle_name_en',
        'third_name_en',
        'last_name_en',
        'first_name_ar',
        'middle_name_ar',
        'third_name_ar',
        'last_name_ar',
        'gender',
        'marital_status',
        'nationality_id',
        'religion',
        'home_country_id',
        'date_of_birth',
        'place_of_birth',

        'user_id',
        'code',
        'head_id',
        'is_active',
        'has_salary',
        'has_biometric',
        'works_on_saturday',
        'joining_date',
        'resignation_date',
        'sponsorship_id',
        'has_married_contract',
        'vacation_class',
        'special_needs_id',

        'created_by',
        'updated_by',
    ];

    /**
     * @return BelongsTo<Country, $this>
     */
    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }

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
        return $this->belongsTo(Employee::class, 'head_id');
    }

    /**
     * @return BelongsTo<Sponsorship, $this>
     */
    public function sponsorship(): BelongsTo
    {
        return $this->belongsTo(Sponsorship::class);
    }

    /**
     * @return BelongsToMany<Category, $this>
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return BelongsToMany<Position, $this>
     */
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class);
    }

    /**
     * @return BelongsToMany<Department, $this>
     */
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_employee');
    }

    /**
     * @return HasMany<Dependent, $this>
     */
    public function dependents(): HasMany
    {
        return $this->hasMany(Dependent::class);
    }
}
