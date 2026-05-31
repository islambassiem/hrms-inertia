<?php

declare(strict_types=1);

use App\Domain\Shared\Models\ReferenceType;
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
        Schema::create('shared_reference_values', function (Blueprint $table): void {
            $table->id();
            $table->json('name');
            $table->string('code');
            $table->integer('sort_order')->default(0);
            $table->foreignIdFor(ReferenceType::class, 'reference_type_id')->constrained('shared_reference_types');
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users');
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained('users');
            $table->timestamps();

            $table->unique(['reference_type_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_reference_values');
    }
};
