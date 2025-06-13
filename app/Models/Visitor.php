<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Visitor extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address',
        'user_agent',
        'visit_date',
        'is_unique'
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'visit_date' => 'date',
        'is_unique' => 'boolean'
    ];
    
    /**
     * Get total visitor count
     *
     * @return int
     */
    public static function getTotalCount(): int
    {
        return static::where('is_unique', true)->count();
    }
    
    /**
     * Get visitor count for today
     *
     * @return int
     */
    public static function getTodayCount(): int
    {
        return static::where('visit_date', Carbon::today())->count();
    }
    
    /**
     * Get visitor count for current week
     *
     * @return int
     */
    public static function getWeekCount(): int
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        return static::whereBetween('visit_date', [$startOfWeek, $endOfWeek])
            ->where('is_unique', true)
            ->count();
    }
    
    /**
     * Get visitor count for current month
     *
     * @return int
     */
    public static function getMonthCount(): int
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        return static::whereBetween('visit_date', [$startOfMonth, $endOfMonth])
            ->where('is_unique', true)
            ->count();
    }
}
