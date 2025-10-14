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
        Schema::table('subscription_tiers', function (Blueprint $table) {
            // Make sure column doesn't already exist to avoid duplicate migration issues
            if (!Schema::hasColumn('subscription_tiers', 'x_package')) {
                $table->unsignedBigInteger('x_package')->nullable()->after('package_id'); // <-- nullable to avoid FK errors

                $table->foreign('x_package')
                    ->references('id')
                    ->on('packages')
                    ->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('subscription_tiers', function (Blueprint $table) {
            $table->dropForeign(['x_package']); // ✅ correct way
            $table->dropColumn('x_package');    // ✅ also drop column
        });
    }

};
