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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('content')->nullable();
            $table->string('category');
            $table->string('thumbnail_path')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('download_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->enum('access_level', ['public', 'registered', 'admin'])->default('public');
            $table->boolean('is_published')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
