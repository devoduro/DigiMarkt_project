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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->text('description');
            $table->enum('status', ['Upcoming', 'In Progress', 'Completed', 'Delayed'])->default('Upcoming');
            $table->boolean('is_featured')->default(false);
            $table->integer('completion_percentage')->default(0);
            $table->integer('display_order')->default(0);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
