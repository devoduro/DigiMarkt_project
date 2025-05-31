<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
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
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'category',
        'is_public',
        'access_level',
        'is_published',
        'uploaded_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
            'is_published' => 'boolean',
            'file_size' => 'integer',
        ];
    }

    /**
     * Get the user who uploaded the document
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the downloads for this document
     */
    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
    }

    /**
     * Check if the document is accessible by a user
     */
    public function isAccessibleBy(?User $user): bool
    {
        // Only published documents are accessible
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
                // Fallback to old logic for backward compatibility
                if ($this->is_public) {
                    return true;
                }
                
                if (!$user) {
                    return false;
                }
                
                if ($user->isAdmin()) {
                    return true;
                }
                
                return true;
        }
    }
}
