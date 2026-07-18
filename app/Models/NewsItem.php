<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'content',
        'published_at',
        'is_published',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}