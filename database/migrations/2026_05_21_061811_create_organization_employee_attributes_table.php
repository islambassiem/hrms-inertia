<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Models\Attribute;
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
        Schema::create('organization_employee_attributes', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained('employees');
            $table->foreignIdFor(Attribute::class)->constrained('employees');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('organization_employee_attributes');
    }
};
