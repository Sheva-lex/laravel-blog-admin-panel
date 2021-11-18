<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
    ];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y h:i:s',
        'updated_at' => 'datetime:d.m.Y h:i:s',
    ];

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'post_id', 'id');
    }
}
