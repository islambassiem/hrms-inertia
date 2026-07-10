<?php

declare(strict_types=1);

use App\Domain\Employee\Models\AllowanceType;
use App\Domain\Employee\Models\Employee;
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
        Schema::create('employee_allowances', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained('employees');
            $table->foreignIdFor(AllowanceType::class)->constrained('employee_allowance_types');
            $table->integer('amount');
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users');
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained('users');
            $table->timestamps();

            $table->unique(['employee_id', 'effective_from']);
            $table->index(['employee_id', 'effective_from']);
            $table->index(['employee_id', 'effective_to']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_allowances');
    }
};
