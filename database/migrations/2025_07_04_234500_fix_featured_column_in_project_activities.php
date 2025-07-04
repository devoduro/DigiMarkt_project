<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First check if the column exists
        if (Schema::hasColumn('project_activities', 'is_featured') && !Schema::hasColumn('project_activities', 'featured')) {
            // Rename is_featured to featured
            Schema::table('project_activities', function (Blueprint $table) {
                $table->renameColumn('is_featured', 'featured');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the column exists
        if (Schema::hasColumn('project_activities', 'featured') && !Schema::hasColumn('project_activities', 'is_featured')) {
            // Rename featured back to is_featured
            Schema::table('project_activities', function (Blueprint $table) {
                $table->renameColumn('featured', 'is_featured');
            });
        }
    }
};
