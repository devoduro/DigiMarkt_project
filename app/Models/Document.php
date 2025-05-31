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
        // Public documents are accessible by anyone
        if ($this->is_public) {
            return true;
        }

        // If no user is provided, document is not accessible
        if (!$user) {
            return false;
        }

        // Admins can access all documents
        if ($user->isAdmin()) {
            return true;
        }

        // Document is accessible by authenticated users
        return true;
    }
}
