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
        if (!Schema::hasTable('chatbot_conversations')) {
            Schema::create('chatbot_conversations', function (Blueprint $table) {
                $table->id();
                $table->string('session_id')->index();
                $table->string('ip_address')->nullable();
                $table->text('user_message');
                $table->text('bot_response');
                $table->string('response_type')->default('ai'); // 'ai' or 'rule-based'
                $table->integer('response_time_ms')->nullable();
                $table->integer('tokens_used')->nullable();
                $table->boolean('was_helpful')->nullable();
                $table->text('feedback')->nullable();
                $table->timestamps();
                
                // Indexes for analytics
                $table->index('created_at');
                $table->index('response_type');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbot_conversations');
    }
};
