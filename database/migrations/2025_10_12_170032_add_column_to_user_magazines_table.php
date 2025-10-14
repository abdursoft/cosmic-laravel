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
        Schema::table('user_magazines', function (Blueprint $table) {
            $table->after('magazine_id', function($table){
                $table->bigInteger('issue_sequence_index')->default(1);
                $table->timestamp('sequence_date')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_magazines', function (Blueprint $table) {
            //
        });
    }
};
