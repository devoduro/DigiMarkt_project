<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Milestone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'date',
        'description',
        'status',
        'completion_percentage',
        'featured',
        'display_order',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'completion_percentage' => 'integer',
            'display_order' => 'integer',
            'featured' => 'boolean',
        ];
    }

    /**
     * Get the user who created the milestone
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the deliverables for this milestone
     */
    public function deliverables(): HasMany
    {
        return $this->hasMany(MilestoneDeliverable::class);
    }
}
