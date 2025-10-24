<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatbotConversation extends Model
{
    protected $fillable = [
        'session_id',
        'ip_address',
        'user_message',
        'bot_response',
        'response_type',
        'response_time_ms',
        'tokens_used',
        'was_helpful',
        'feedback'
    ];

    protected $casts = [
        'was_helpful' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get conversation history for a session
     *
     * @param string $sessionId
     * @param int $limit
     * @return array
     */
    public static function getSessionHistory(string $sessionId, int $limit = 10): array
    {
        $conversations = self::where('session_id', $sessionId)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        $history = [];
        foreach ($conversations->reverse() as $conv) {
            $history[] = [
                'role' => 'user',
                'content' => $conv->user_message
            ];
            $history[] = [
                'role' => 'assistant',
                'content' => $conv->bot_response
            ];
        }

        return $history;
    }

    /**
     * Get analytics data
     *
     * @return array
     */
    public static function getAnalytics(): array
    {
        return [
            'total_conversations' => self::count(),
            'ai_responses' => self::where('response_type', 'ai')->count(),
            'rule_based_responses' => self::where('response_type', 'rule-based')->count(),
            'avg_response_time' => self::avg('response_time_ms'),
            'total_tokens_used' => self::sum('tokens_used'),
            'helpful_responses' => self::where('was_helpful', true)->count(),
        ];
    }
}
