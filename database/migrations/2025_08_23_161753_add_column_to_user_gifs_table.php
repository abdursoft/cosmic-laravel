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
        Schema::table('user_gifs', function (Blueprint $table) {
            $table->after('price',function($table){
                $table->string('payment_id');
                $table->string('txn_id')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_gifs', function (Blueprint $table) {
            $table->dropColumn('payment_id','txn_id');
        });
    }
};
