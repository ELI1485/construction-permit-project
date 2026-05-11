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
        Schema::create('technical_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permit_id')->constrained('permits')->onDelete('cascade');
            $table->foreignId('reviewed_by')->constrained('users')->onDelete('cascade');
            $table->boolean('conformite');
            $table->text('remarque')->nullable();
            $table->dateTime('reviewed_at');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('technical_reviews'); }
};
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('technical_reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_reviews');
    }
};
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
