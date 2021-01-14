<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $guarded = [];

    use HasFactory;

    public static function boot()
    {
        parent::boot();

        // creates slug automatically
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image_path()
    {
        $profile_src = 'https://upload.wikimedia.org/wikipedia/en/f/f9/No-image-available.jpg';
        if ($this->image) {
            return '/storage/post_images/' . $this->image;
        }
        return $profile_src;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSubDescriptionAttribute()
    {
        return Str::substr($this->description, 1,30).'...';
    }
}
