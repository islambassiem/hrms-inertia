<?php

declare(strict_types=1);

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
        Schema::create('workflow_approvals', function (Blueprint $table): void {
            $table->id();
            $table->string('approveable_type');
            $table->unsignedBigInteger('approveable_id');
            $table->unsignedBigInteger('approver_id');
            $table->unsignedBigInteger('role_id');
            $table->integer('status');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_approvals');
    }
};
