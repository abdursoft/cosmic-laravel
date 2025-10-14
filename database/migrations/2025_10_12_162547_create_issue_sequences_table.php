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
        Schema::create('issue_sequences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('magazine_id')->constrained('magazines')->cascadeOnDelete();
            $table->foreignId('issue_id')->constrained('issues')->cascadeOnDelete();
            $table->enum('status',['active','archived'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_sequences');
    }
};
