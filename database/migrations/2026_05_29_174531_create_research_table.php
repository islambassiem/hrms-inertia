<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Research\Models\Domain;
use App\Domain\Research\Models\Language;
use App\Domain\Research\Models\Nature;
use App\Domain\Research\Models\Status;
use App\Domain\Research\Models\Type;
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
        Schema::create('research', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->foreignIdFor(Status::class)->nullable()->constrained();
            $table->foreignIdFor(Type::class)->nullable()->constrained();
            $table->foreignIdFor(Nature::class)->nullable()->constrained();
            $table->foreignIdFor(Domain::class)->nullable()->constrained();
            $table->string('title')->nullable();
            $table->date('publishing_date')->nullable();
            $table->string('publisher')->nullable();
            $table->string('isbn')->nullable();
            $table->string('magazine')->nullable();
            $table->unsignedTinyInteger('edition')->nullable();
            $table->unsignedSmallInteger('page_count')->nullable();
            $table->string('publication_location')->nullable();
            $table->text('summary')->nullable();
            $table->foreignIdFor(Language::class)->nullable()->constrained();
            $table->string('publishing_url')->nullable();
            $table->string('keywords')->nullable();
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
        Schema::dropIfExists('research');
    }
};
