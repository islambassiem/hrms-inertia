<?php

declare(strict_types=1);

use App\Domain\Workflow\Models\Workflow;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workflow_steps', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Workflow::class)->constrained();
            $table->json('name');
            $table->json('description')->nullable();
            $table->integer('step_order');
            $table->foreignIdFor(Role::class)->constrained();
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
        Schema::dropIfExists('workflow_steps');
    }
};
