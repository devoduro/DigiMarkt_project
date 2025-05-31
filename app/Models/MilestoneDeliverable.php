<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilestoneDeliverable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'milestone_id',
        'title',
        'description',
        'file_path',
        'file_name',
        'restricted',
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
            'restricted' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    /**
     * Get the milestone that owns the deliverable
     */
    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }
    
    /**
     * Get the user who created the deliverable
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
