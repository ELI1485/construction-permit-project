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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('obligatoire')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('document_types'); }
};
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_types');
    }
};
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
