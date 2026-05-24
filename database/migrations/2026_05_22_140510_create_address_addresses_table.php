<?php

declare(strict_types=1);

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
        Schema::create('address_addresses', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->string('short_address');
            $table->string('building_number')->nullable();
            $table->string('street')->nullable();
            $table->string('secondary_number')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('address_addresses');
    }
};
