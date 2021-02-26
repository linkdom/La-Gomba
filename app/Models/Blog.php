<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'paragraph', 'image'];

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function embeds() {
        return $this->morphMany(Embed::class, 'embedable');
    }
}
