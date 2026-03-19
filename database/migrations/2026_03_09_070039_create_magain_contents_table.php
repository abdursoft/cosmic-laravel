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
        Schema::create('magain_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('magazine_id')->constrained('magazines')->cascadeOnDelete();
            $table->string('url');
            $table->string('path');
            $table->string('ext');
            $table->integer('index_number');
            $table->enum('is_published', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magain_contents');
    }
};
