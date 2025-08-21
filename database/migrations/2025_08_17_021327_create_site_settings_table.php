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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('keywords')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitterX')->nullable();
            $table->string('reddit')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->longText('description')->nullable();
            $table->string('favicon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
