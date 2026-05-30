<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Qualification\Models\EducationalSubLevel;
use App\Domain\Qualification\Models\GpaType;
use App\Domain\Qualification\Models\IncludedSpecialty;
use App\Domain\Qualification\Models\Rating;
use App\Domain\Qualification\Models\ResearchType;
use App\Domain\Qualification\Models\ScientificDegree;
use App\Domain\Qualification\Models\Specialty;
use App\Domain\Qualification\Models\StudyType;
use App\Domain\Shared\Models\Country;
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
        Schema::create('qualifications', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->foreignIdFor(Specialty::class, 'major_id')->constrained();
            $table->foreignIdFor(Specialty::class, 'minor_id')->nullable()->constrained();
            $table->foreignIdFor(EducationalSubLevel::class)->nullable()->constrained();
            $table->foreignIdFor(IncludedSpecialty::class)->nullable()->constrained();
            $table->string('institution_name')->nullable();
            $table->string('college_name')->nullable();
            $table->foreignIdFor(ScientificDegree::class)->nullable()->constrained();
            $table->date('graduation_date')->nullable();
            $table->foreignIdFor(Country::class, 'graduation_country_id')->nullable()->constrained();
            $table->boolean('is_last_qualification')->default(false);
            $table->foreignIdFor(Rating::class)->nullable()->constrained();
            $table->string('gpa')->nullable();
            $table->foreignIdFor(GpaType::class)->nullable()->constrained();
            $table->foreignIdFor(StudyType::class)->nullable()->constrained();
            $table->string('city')->nullable();
            $table->foreignIdFor(ResearchType::class)->nullable()->constrained();
            $table->boolean('is_authenticated')->default(false);
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users');
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained('users');
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
