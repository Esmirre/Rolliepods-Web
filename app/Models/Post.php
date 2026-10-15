<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Maps onto the `announcements` table (plus image + card_color from rolliepods_additions.sql).
class Post extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'announcement_id';

    protected $fillable = ['title', 'content', 'image', 'card_color', 'author_id', 'is_published'];
    protected $casts = ['is_published' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'user_id');
    }
}
