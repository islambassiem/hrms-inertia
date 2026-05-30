<?php

declare(strict_types=1);

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
        Schema::create('organization_departments', function (Blueprint $table): void {
            $table->id();
            $table->json('name');
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('parent_id')->nullable()->constrained('organization_departments');
            $table->foreignId('head_id')->nullable()->constrained('employees');
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
        Schema::dropIfExists('organization_departments');
    }
};
