<?php

use App\Enums\IdentificationType;
use App\Models\Employee;
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
        Schema::create('identifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->enum('type', IdentificationType::toArray());
            $table->string('id_number', 15);
            $table->string('place_of_issue')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('date_of_expiry')->nullable();
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
        Schema::dropIfExists('identifications');
    }
};
