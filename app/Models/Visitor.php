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
    
    /**
     * Get visitor count for yesterday
     *
     * @return int
     */
    public static function getYesterdayCount(): int
    {
        return static::where('visit_date', Carbon::yesterday())->count();
    }
    
    /**
     * Get visitor count for last 7 days
     *
     * @return int
     */
    public static function getLast7DaysCount(): int
    {
        $startDate = Carbon::now()->subDays(7);
        
        return static::where('visit_date', '>=', $startDate)
            ->where('is_unique', true)
            ->count();
    }
    
    /**
     * Get visitor count for last 30 days
     *
     * @return int
     */
    public static function getLast30DaysCount(): int
    {
        $startDate = Carbon::now()->subDays(30);
        
        return static::where('visit_date', '>=', $startDate)
            ->where('is_unique', true)
            ->count();
    }
    
    /**
     * Get average daily visitors over last 30 days
     *
     * @return float
     */
    public static function getAverageDailyVisitors(): float
    {
        $startDate = Carbon::now()->subDays(30);
        $totalVisitors = static::where('visit_date', '>=', $startDate)
            ->where('is_unique', true)
            ->count();
            
        return round($totalVisitors / 30, 1);
    }
    
    /**
     * Get peak visitor day information
     *
     * @return array
     */
    public static function getPeakVisitorDay(): array
    {
        $peakDay = static::selectRaw('visit_date, COUNT(*) as visitor_count')
            ->where('visit_date', '>=', Carbon::now()->subDays(30))
            ->where('is_unique', true)
            ->groupBy('visit_date')
            ->orderByDesc('visitor_count')
            ->first();
            
        if (!$peakDay) {
            return ['date' => null, 'count' => 0];
        }
        
        return [
            'date' => Carbon::parse($peakDay->visit_date)->format('M d, Y'),
            'count' => $peakDay->visitor_count
        ];
    }
    
    /**
     * Get visitor growth rate (this week vs last week)
     *
     * @return float
     */
    public static function getGrowthRate(): float
    {
        $thisWeekStart = Carbon::now()->startOfWeek();
        $thisWeekEnd = Carbon::now()->endOfWeek();
        $lastWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        
        $thisWeekCount = static::whereBetween('visit_date', [$thisWeekStart, $thisWeekEnd])
            ->where('is_unique', true)
            ->count();
            
        $lastWeekCount = static::whereBetween('visit_date', [$lastWeekStart, $lastWeekEnd])
            ->where('is_unique', true)
            ->count();
            
        if ($lastWeekCount == 0) {
            return $thisWeekCount > 0 ? 100.0 : 0.0;
        }
        
        return round((($thisWeekCount - $lastWeekCount) / $lastWeekCount) * 100, 1);
    }
    
    /**
     * Get monthly visitor data for chart (last 12 months)
     *
     * @return array
     */
    public static function getMonthlyVisitorData(): array
    {
        $data = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();
            
            $count = static::whereBetween('visit_date', [$startOfMonth, $endOfMonth])
                ->where('is_unique', true)
                ->count();
                
            $data[] = $count;
        }
        
        return $data;
    }
    
    /**
     * Get daily visitor data for specified number of days
     *
     * @param int $days
     * @return array
     */
    public static function getDailyVisitorData(int $days = 30): array
    {
        $data = [];
        $labels = [];
        
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = static::where('visit_date', $date->toDateString())
                ->where('is_unique', true)
                ->count();
                
            $data[] = $count;
            $labels[] = $date->format('M d');
        }
        
        return ['data' => $data, 'labels' => $labels];
    }
    
    /**
     * Get hourly visitor data for today
     *
     * @return array
     */
    public static function getHourlyVisitorData(): array
    {
        $data = [];
        $labels = [];
        
        for ($hour = 0; $hour < 24; $hour++) {
            $startTime = Carbon::today()->addHours($hour);
            $endTime = Carbon::today()->addHours($hour + 1);
            
            $count = static::whereBetween('created_at', [$startTime, $endTime])
                ->count();
                
            $data[] = $count;
            $labels[] = $startTime->format('H:i');
        }
        
        return ['data' => $data, 'labels' => $labels];
    }
    
    /**
     * Get top countries (mock data for now)
     *
     * @param int $limit
     * @return array
     */
    public static function getTopCountries(int $limit = 5): array
    {
        // Mock data - in real implementation, you'd extract country from IP
        return [
            ['country' => 'United States', 'count' => 45, 'percentage' => 35.2],
            ['country' => 'Canada', 'count' => 28, 'percentage' => 21.9],
            ['country' => 'United Kingdom', 'count' => 22, 'percentage' => 17.2],
            ['country' => 'Germany', 'count' => 18, 'percentage' => 14.1],
            ['country' => 'France', 'count' => 15, 'percentage' => 11.7]
        ];
    }
    
    /**
     * Get top browsers (extracted from user agent)
     *
     * @param int $limit
     * @return array
     */
    public static function getTopBrowsers(int $limit = 5): array
    {
        // Mock data - in real implementation, you'd parse user_agent
        return [
            ['browser' => 'Chrome', 'count' => 68, 'percentage' => 53.1],
            ['browser' => 'Firefox', 'count' => 25, 'percentage' => 19.5],
            ['browser' => 'Safari', 'count' => 20, 'percentage' => 15.6],
            ['browser' => 'Edge', 'count' => 10, 'percentage' => 7.8],
            ['browser' => 'Opera', 'count' => 5, 'percentage' => 3.9]
        ];
    }
    
    /**
     * Get top devices (desktop, mobile, tablet)
     *
     * @return array
     */
    public static function getTopDevices(): array
    {
        // Mock data - in real implementation, you'd parse user_agent
        return [
            ['device' => 'Desktop', 'count' => 78, 'percentage' => 60.9],
            ['device' => 'Mobile', 'count' => 42, 'percentage' => 32.8],
            ['device' => 'Tablet', 'count' => 8, 'percentage' => 6.3]
        ];
    }
}
