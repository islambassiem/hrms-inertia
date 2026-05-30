<?php

declare(strict_types=1);

use App\Domain\Course\Models\Type;
use App\Domain\Employee\Models\Employee;
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
        Schema::create('course_courses', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained('employees');
            $table->string('course_name')->nullable();
            $table->foreignIdFor(Type::class)->nullable()->constrained();
            $table->string('issuer')->nullable();
            $table->year('awarding_year')->nullable();
            $table->string('course_period')->nullable();
            $table->string('city')->nullable();
            $table->foreignIdFor(Country::class)->nullable()->constrained('shared_countries');
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
        Schema::dropIfExists('course_courses');
    }
};
