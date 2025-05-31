<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'document_id',
        'ip_address',
        'user_agent',
    ];

    /**
     * Get the user who downloaded the document
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the document that was downloaded
     */
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
