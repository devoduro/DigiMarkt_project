<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
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
        'thumbnail_path',
        'file_path',
        'file_name',
        'access_level',
        'is_featured',
        'is_published',
        'created_by',
        'download_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Get the user who created the resource
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Check if the resource is accessible by a user
     */
    public function isAccessibleBy(?User $user): bool
    {
        // Only published resources are accessible
        if (!$this->is_published) {
            return $user && $user->isAdmin();
        }
        
        // Check access level
        switch ($this->access_level) {
            case 'public':
                return true;
                
            case 'registered':
                return $user !== null;
                
            case 'admin':
                return $user && $user->isAdmin();
                
            default:
                return $user && $user->isAdmin();
        }
    }
}
