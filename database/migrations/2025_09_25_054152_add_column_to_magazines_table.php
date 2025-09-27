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
        Schema::table('magazines', function (Blueprint $table) {
            $table->after('thumbnail',function($table){
                $table->bigInteger('archive_days')->default(90);
                $table->bigInteger('archive_access')->default(0);
                $table->timestamp('publish_date');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('magazines', function (Blueprint $table) {
            //
        });
    }
};
