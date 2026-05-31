<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
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
        Schema::create('leave_requests', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->foreignIdFor(LeaveType::class)->constrained();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_days');
            $table->integer('status');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('leave_requests');
    }
};
