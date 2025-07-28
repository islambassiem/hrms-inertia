<?php

use App\Models\Branch;
use App\Models\College;
use App\Models\Department;
use App\Models\Entity;
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
        Schema::create('department_hierarchies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Branch::class)->nullable()->constrained();
            $table->foreignIdFor(College::class)->nullable()->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(Entity::class)->nullable()->constrained();
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
        Schema::dropIfExists('department_hierarchies');
    }
};
