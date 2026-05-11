<?php

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
        Schema::create('permits', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id')
                ->nullable();

            $table->string('permit_type')
                ->nullable();

            $table->double('surface')
                ->nullable();

            $table->string('status')
                ->default('submitted');

            $table->integer('risk_score')
                ->nullable();

            $table->string('risk_level')
                ->nullable();

            $table->string('ai_priority')
                ->nullable();

            $table->boolean(
                'technical_review_required'
            )->default(false);

            $table->json(
                'ai_recommendations'
            )->nullable();

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