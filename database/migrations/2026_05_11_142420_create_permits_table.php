<?php
<<<<<<< HEAD
=======

>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration {
    public function up(): void {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permit_type_id')->constrained('permit_types')->onDelete('cascade');
            $table->foreignId('citizen_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('architect_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->string('reference_number')->unique();
            $table->string('project_title');
            $table->text('project_address');
            $table->double('surface');
            $table->string('priority')->default('medium');
            $table->dateTime('submitted_at')->nullable();
            $table->double('risk_score')->nullable();
            $table->string('risk_level')->nullable();
            $table->string('ai_priority')->nullable();
            $table->boolean('technical_review_required')->default(false);
            $table->json('ai_recommendations')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('permits'); }
};
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permits');
    }
};
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
