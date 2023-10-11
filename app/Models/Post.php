<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    protected $fillable = 
    [
        'user_id',
        'content'
    ];

      // Kebalikan dari HasMany
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 
}
