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
        Schema::create('milestone_deliverables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('milestone_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('restricted')->default(false);
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
        Schema::dropIfExists('milestone_deliverables');
    }
};
