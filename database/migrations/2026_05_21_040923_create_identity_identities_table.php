<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Identity\Models\IdentityType;
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
        Schema::create('identity_identities', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained('employee_employees');
            $table->foreignIdFor(IdentityType::class)->constrained('identity_identity_types');
            $table->string('identity_number');
            $table->string('place_of_issue')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('identity_identities');
    }
};
