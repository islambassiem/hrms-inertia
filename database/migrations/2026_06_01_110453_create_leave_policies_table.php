<?php

declare(strict_types=1);

use App\Domain\Leave\Models\LeaveType;
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
        Schema::create('leave_policies', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(LeaveType::class)->constrained();
            $table->json('name');
            $table->integer('days_per_year');
            $table->boolean('is_default');
            $table->integer('accrual_frequency')->nullable();
            $table->integer('max_carry_forward')->nullable();
            $table->integer('carry_forward_expiry_months')->nullable();
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users');
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained('users');
            $table->timestamps();

            $table->unique(['leave_type_id', 'is_default']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_policies');
    }
};
