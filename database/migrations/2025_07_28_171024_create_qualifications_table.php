<?php

use App\Enums\GPAType;
use App\Enums\Qualification;
use App\Enums\Rating;
use App\Enums\StudyNature;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Specialty;
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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->enum('qualification', Qualification::toArray());
            $table->text('thesis')->nullable();
            $table->foreignIdFor(Specialty::class, 'major_id')->constrained();
            $table->foreignIdFor(Specialty::class, 'minor_id')->nullable()->constrained();
            $table->enum('rating', Rating::toArray())->nullable();
            $table->string('gpa', 6)->nullable();
            $table->enum('gpa_type', GPAType::toArray())->nullable();
            $table->string('graduation_university', 100)->nullable();
            $table->string('graduation_college', 100)->nullable();
            $table->date('graduation_date');
            $table->string('city', 30)->nullable();
            $table->foreignIdFor(Country::class, 'graduation_country')->nullable()->constrained();
            $table->enum('study_nature', StudyNature::toArray())->nullable();
            $table->boolean('is_attested')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('qualifications');
    }
};
