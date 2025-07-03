<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'is_active',
        'publish_date',
        'expiry_date',
        'priority',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'publish_date' => 'date',
        'expiry_date' => 'date',
        'priority' => 'integer',
    ];
    
    /**
     * Scope a query to only include active announcements.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where('publish_date', '<=', now())
                     ->where(function ($query) {
                         $query->whereNull('expiry_date')
                               ->orWhere('expiry_date', '>=', now());
                     });
    }
    
    /**
     * Scope a query to order announcements by priority.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByPriority($query)
    {
        return $query->orderBy('priority', 'desc')
                     ->orderBy('publish_date', 'desc');
    }
}
