<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPackage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
        'completion_percentage',
        'start_date',
        'end_date',
        'is_published',
        'is_featured',
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
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    /**
     * Get the user who created the work package
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
