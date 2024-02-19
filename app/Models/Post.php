<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'body',
        'user_id',
        'reactions'
    ];

    public function comment(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'tags', 'id');
    }
}
