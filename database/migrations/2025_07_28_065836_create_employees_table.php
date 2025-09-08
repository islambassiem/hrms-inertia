<?php

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Enums\Religion;
use App\Enums\SpecialNeeds;
use App\Enums\VacationClass;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Sponsorship;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code', 6)->unique();
            $table->foreignIdFor(User::class, 'user_id')->unique()->constrained();
            $table->foreignIdFor(Employee::class, 'head_id')->nullable()->constrained();

            $table->string('first_name_en', 20);
            $table->string('middle_name_en', 20)->nullable();
            $table->string('third_name_en', 20)->nullable();
            $table->string('family_name_en', 20);
            $table->string('first_name_ar', 20);
            $table->string('middle_name_ar', 20)->nullable();
            $table->string('third_name_ar', 20)->nullable();
            $table->string('family_name_ar', 20);
            $table->enum('gender', Gender::toArray());
            $table->enum('marital_status', MaritalStatus::toArray())->nullable();
            $table->foreignIdFor(Country::class, 'nationality_id')->constrained();
            $table->enum('religion', Religion::toArray())->nullable();
            $table->string('home_country_id', 20)->nullable();
            $table->date('date_of_birth');
            $table->foreignIdFor(Country::class, 'place_of_birth')->nullable()->constrained();

            $table->boolean('is_active')->default(true);
            $table->boolean('has_salary')->default(true);
            $table->boolean('has_biometric')->default(true);
            $table->boolean('works_on_saturday')->default(false);
            $table->date('joining_date');
            $table->date('resignation_date')->nullable();
            $table->foreignIdFor(Sponsorship::class, 'sponsorship_id')->nullable()->constrained();
            $table->boolean('has_married_contract')->default(false);
            $table->enum('vacation_class', VacationClass::toArray())->default(VacationClass::ZERO->value);
            $table->enum('special_needs', SpecialNeeds::toArray())->nullable();

            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained();
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
