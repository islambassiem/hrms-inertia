<?php

declare(strict_types=1);

use App\Domain\Dependent\Models\Relationship;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Gender;
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
        Schema::create('dependent_dependents', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('identification');
            $table->foreignIdFor(Gender::class)->constrained();
            $table->date('date_of_birth');
            $table->foreignIdFor(Relationship::class)->constrained();
            $table->boolean('has_insurance')->default(false);
            $table->integer('ticket_ratio')->default(0);
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
        Schema::dropIfExists('dependent_dependents');
    }
};
