<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Category;
use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Models\Department;
use App\Domain\Shared\Models\Country;
use App\Domain\Shared\Models\Gender;
use App\Domain\Shared\Models\MaritalStatus;
use App\Domain\Shared\Models\Religion;
use App\Domain\Shared\Models\SpecialNeeds;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_employees', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Employee::class, 'head_id')->nullable()->constrained('employee_employees');

            $table->string('employee_code', 10)->unique();

            $table->string('first_name_ar', 30);
            $table->string('middle_name_ar', 30)->nullable();
            $table->string('third_name_ar', 30)->nullable();
            $table->string('last_name_ar', 30);

            $table->string('first_name_en', 30);
            $table->string('middle_name_en', 30)->nullable();
            $table->string('third_name_en', 30)->nullable();
            $table->string('last_name_en', 30);

            $table->foreignIdFor(MaritalStatus::class)->nullable()->constrained();
            $table->foreignIdFor(Religion::class)->nullable()->constrained();
            $table->foreignIdFor(SpecialNeeds::class)->nullable()->constrained('shared_special_needs');

            $table->foreignIdFor(Gender::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained('employee_categories');
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(Country::class, 'nationality_id')->constrained();
            $table->foreignIdFor(Country::class, 'place_of_birth')->nullable()->constrained();

            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->date('joining_date')->nullable()->index();
            $table->date('leaving_date')->nullable();

            $table->string('home_telephone_number')->nullable();
            $table->string('home_country_identity')->nullable();
            $table->string('blood_type')->nullable();

            $table->boolean('is_active')->default(true)->index();

            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained();
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained();
            $table->timestamps();


            $table->index([
                'first_name_ar',
                'middle_name_ar',
                'third_name_ar',
                'last_name_ar',
                'first_name_en',
                'middle_name_en',
                'third_name_en',
                'last_name_en',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_employees');
    }
};
