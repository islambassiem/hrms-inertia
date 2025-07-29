<?php

use App\Enums\AcademicRank;
use App\Enums\AccomodationStatus;
use App\Enums\AppointmentType;
use App\Enums\EmploymentStatus;
use App\Enums\JobNature;
use App\Enums\ProfessionalRank;
use App\Models\City;
use App\Models\Employee;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\Section;
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
        Schema::create('academic_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->string('position', 50)->nullable();
            $table->foreignIdFor(Institution::class)->constrained();
            $table->foreignIdFor(City::class)->constrained();
            $table->foreignIdFor(Faculty::class)->nullable()->constrained();
            $table->foreignIdFor(Section::class)->nullable()->constrained();
            $table->foreignIdFor(Specialty::class, 'major_id')->constrained();
            $table->foreignIdFor(Specialty::class, 'minor_id')->constrained();
            $table->string('employment_number', 10)->nullable();
            $table->enum('academic_rank', AcademicRank::toArray())->nullable();
            $table->enum('professional_rank', ProfessionalRank::toArray())->nullable();
            $table->date('hiring_date')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('resignation_date')->nullable();
            $table->enum('appointment_type', AppointmentType::toArray())->nullable();
            $table->enum('employment_status', EmploymentStatus::toArray())->nullable();
            $table->string('tasks')->nullable();
            $table->enum('job_nature', JobNature::toArray())->nullable();
            $table->enum('accommodation_status', AccomodationStatus::toArray())->nullable();
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
        Schema::dropIfExists('academic_experiences');
    }
};
