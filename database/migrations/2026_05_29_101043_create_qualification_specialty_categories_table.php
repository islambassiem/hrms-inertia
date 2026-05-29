<?php

declare(strict_types=1);

use App\Domain\Qualification\Models\SpecialtyCategory;
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
        Schema::create('qualification_specialty_categories', function (Blueprint $table): void {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->foreignIdFor(SpecialtyCategory::class, 'parent_id')->nullable()->constrained();
            $table->string('code');
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
        Schema::dropIfExists('qualification_specialty_categories');
    }
};
