<?php

use App\Enums\ResearchCitation;
use App\Enums\ResearchDomain;
use App\Enums\ResearchLanguage;
use App\Enums\ResearchNature;
use App\Enums\ResearchProgress;
use App\Enums\ResearchStatus;
use App\Enums\ResearchType;
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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->enum('type', ResearchType::toArray())->nullable();
            $table->enum('status', ResearchStatus::toArray())->nullable();
            $table->enum('progress', ResearchProgress::toArray())->nullable();
            $table->enum('nature', ResearchNature::toArray())->nullable();
            $table->enum('domain', ResearchDomain::toArray())->nullable();
            $table->enum('citation', ResearchCitation::toArray())->nullable();
            $table->enum('language', ResearchLanguage::toArray())->nullable();
            $table->string('title')->nullable();
            $table->string('publication_location')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('publisher', 60)->nullable();
            $table->string('edition', 10)->nullable();
            $table->string('isbn', 13)->nullable();
            $table->string('magazine', 100)->nullable();
            $table->string('publishing_url', 100)->nullable();
            $table->text('summary')->nullable();
            $table->string('key_words', 200)->nullable();
            $table->string('pages_number', 5)->nullable();
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
        Schema::dropIfExists('research');
    }
};
